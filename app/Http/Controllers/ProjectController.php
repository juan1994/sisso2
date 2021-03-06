<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\SessionService;
use DB;
use File;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Storage;

use Redirect;
use App\Quotation;


class ProjectController extends Controller
{
    private $session;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->session = new SessionService();
    }
    /**
     * Listado de proyectos
     */
    public function getList()
    {
        $proyecto = DB::select('select  @rownum:=@rownum+1 AS rownum, `idproyecto`,`nombreProyecto`,`fechaRegistro`,`fechaInicio`,`fechaFinalizacion`,`presuesto`,`problacionBeneficiada`,`nombreResponsable`,`descripcion`,`objetivoGeneral`,`tipoModalidad_idtipoModalidad`,`EstadoProyecto` from `proyecto`');
        //var_dump($proyecto);
        return view('proyecto-listar')->with('session', $this->session->getSession())->with('proyecto', $proyecto);
    }

    /**
     * permiss PRUP
     */
    public function getUpdateProject()
    {
        $session_user = $this->session->getSession();
        if(!$this->session->validatePermission('PRUP')){
            return redirect()->route('home', []);
        }
        $idproject = Input::get('idproject', 0);
        $project_detail = DB::select('select `idproyecto`,`nombreProyecto`,`fechaRegistro`,`fechaInicio`,`fechaFinalizacion`,`presuesto`,`problacionBeneficiada`,`nombreResponsable`,`descripcion`,`objetivoGeneral`,`tipoModalidad_idtipoModalidad`,`EstadoProyecto` from `proyecto` where idproyecto=?', array($idproject));
        return view('proyecto-actualizar')->with('session', $session_user)->with('project', $project_detail[0]);
    }
    public function updateProject(){
        $input = Input::all();
        DB::table('proyecto')
            ->where('idproyecto', $input["idproject"])
            ->update([
            'nombreProyecto' => $input["NombreProyecto"],
            'fechaInicio' => $input["FechaInicio"],
            'fechaFinalizacion' => $input["FechaFinalizacion"],
            'presuesto' => $input["Presupuesto"],
            'problacionBeneficiada' => $input["PoblacionBeneficiada"],
            'nombreResponsable' => $input["NombreResponsable"],
            'tipoModalidad_idtipoModalidad' => $input["TipoModalidad"],
            'descripcion' => $input["BreveDescripcion"],
            'objetivoGeneral' => $input["ObjetivoGeneral"]
            ]);
        return redirect()->route('detalle-proyecto', ['proyectoid' => $input["idproject"]]);
    }
    public function getDetailProject()
    {
        $session_user = $this->session->getSession();
        $permiss_edit = 0;
        $evaluation_done = true;
        $proyectoid = Input::get('proyectoid', 0);
        $proyecto   = DB::select('select
                `idproyecto`,`nombreProyecto`,`fechaRegistro`,`fechaInicio`,`fechaFinalizacion`,`presuesto`,`problacionBeneficiada`,`nombreResponsable`,`descripcion`,`objetivoGeneral`,`tipoModalidad_idtipoModalidad`,`EstadoProyecto` from `proyecto` where idproyecto=?', array($proyectoid));
        $proyectoAnexo = DB::select('select `idAnexo`,`NombreAnexo`,`Descripcion`, `Ruta` FROM `anexo` where `proyecto_idprotecto`=?', array($proyectoid));
        $proyectoEvaluacion = DB::select('select  idevaluacion,
                `resultado`, `fecha`, `actualizacion`FROM `evaluacion` where `proyecto_idproyecto`=?', array($proyectoid));
        foreach($proyectoEvaluacion as $evaluation){
            $evaluation->count_matriz = app('App\Http\Controllers\EvaluationItemController')->getUsersMatriz($evaluation->idevaluacion);
            $evaluation->count_evaluation = app('App\Http\Controllers\EvaluationItemController')->getUsersEvaluation($evaluation->idevaluacion);
            $evaluation->permiss_m = false;
            if($session_user->status != 0){
              foreach ($evaluation->count_matriz as $c) {
                if($session_user->code == $c->user){
                  $evaluation->permiss_m = true;
                  break;
                }
              }
            }
            // validacion de evaluaciones incompletas
            if(count($evaluation->count_matriz) < 3 || count($evaluation->count_evaluation) < 3){
              $evaluation_done = false;
            }
        }
        //dd($proyectoEvaluacion);
        if($session_user->status != 0){
            // permisos sobre le proyecto
            $users_project = DB::select('SELECT count(*) as permiss FROM usuario_has_proyecto where protecto_idprotecto=? and usuario_codigo=?', array($proyectoid, $session_user->code));
            $permiss_edit = $users_project[0]->permiss;
        }
        return view('proyecto-detalle')->with('session', $session_user)->with('proyecto', $proyecto)->with('proyectoAnexo', $proyectoAnexo)->with('proyectoEvaluacion', $proyectoEvaluacion)->with('permiss_edit', $permiss_edit)
        ->with('evaluation_done', $evaluation_done);
    }
    // detalle de las evaluaciones
    public function show($id)
    {
        $result = DB::select("select usuario_codigo,
        (select concat(nombres, ' ', apellidos) from usuario where codigo=m.usuario_codigo) as name,
        max(actualizacion) as act_matriz,
        (select max(actualizacion) from calificacion where evaluacion_idevaluacion=max(m.evaluacion_idevaluacion) and usuario_codigo=m.usuario_codigo) as act_eval
         from matriz m where m.evaluacion_idevaluacion=? group by usuario_codigo", array($id));
        return response()->json($result);
    }

    /**
     * Mostrar formulario de creación
     * permiss PRCR
     */
    public function getProjectRegister()
    {
        $session_user = $this->session->getSession();
        if(!$this->session->validatePermission('PRCR')){
            return redirect()->route('home', []);
        }
        return view('proyecto-registrar')->with('session', $session_user);
    }
    public function createProjectRegister()
    {
        $session_user = $this->session->getSession();
        $date_string = date("Y/m/d h:i");
        // pasar datos a estructura
        $data = request()->all();
        //guardar datos
        if($session_user->status != 0){
            DB::transaction(function()
            use ($data, $date_string, $session_user){
                $idProject = DB::table('proyecto')->insertGetId(
                    ['nombreProyecto' => $data['NombreProyecto'], 'fechaRegistro' => $date_string,
                    'fechaInicio' => $data['FechaInicio'], 'fechaFinalizacion' => $data['FechaFinalizacion'], 'presuesto' => $data['Presupuesto'],
                    'problacionBeneficiada' => $data['PoblacionBeneficiada'], 'nombreResponsable' => $data['NombreResponsable'],
                    'descripcion' => $data['BreveDescripcion'],'objetivoGeneral' => $data['ObjetivoGeneral'],
                    'tipoModalidad_idtipoModalidad' => $data['TipoModalidad'],'EstadoProyecto' => 0 ]);
                $res = DB::table('usuario_has_proyecto')->insert(
                    ['usuario_codigo' => $session_user->code, 'protecto_idprotecto' => $idProject]);
                if(strlen($data['segundo-integrante']) > 0){
                    $res = DB::table('usuario_has_proyecto')->insert(
                        ['usuario_codigo' => $data['segundo-integrante'], 'protecto_idprotecto' => $idProject]);
                }
                if(strlen($data['tercer-integrante']) > 0){
                    $res = DB::table('usuario_has_proyecto')->insert(
                        ['usuario_codigo' => $data['tercer-integrante'], 'protecto_idprotecto' => $idProject]);
                }
            });
            return redirect()->route('proyecto', []);
        }else{
            return view('proyecto-registrar')->with('session', $session_user);
        }
    }

    private function createEvaluation(Request $request){
        $idproject      = Input::get('idproject', '');
        $date_string    = date("Y/m/d h:i");
        DB::table('evaluacion')->insert(
            ['resultado' => 0, 'proyecto_idproyecto' => $idproject,
            'fecha' => $date_string, 'actualizacion' => $date_string]);
        return Redirect::action('ProjectController@getDetailProject', array('proyectoid' => $idproject));
    }
    /**
     * Operaciones - Archivos
     */
    public function getFile(Request $request)
    {
        $pathfile = Input::get('pathfile', '');
        $name = Input::get('name', 'demo');
        $idproject = Input::get('idproject', 0);
        if(Storage::exists($pathfile)) {
            $pos = strrpos($pathfile, ".");
            $ext = substr($pathfile,$pos);
            return Storage::download($pathfile,  strval($idproject) .'-' . $name . $ext);
        } else {
            $session_user = $this->session->getSession();
            return view('notfoundfile')->with('session', $session_user);
        }
    }
      /**
     * Operación sobre el proyecto
     * Eliminar - Actualizar
     */
    public function operation(Request $request)
    {
        $date_string    = date("Y/m/d h:i");
        $operation = Input::get('operation', '');
        $idproject      = Input::get('idproject', '');

        if($operation == 'U'){
            $nombre_archivo = Input::get('myFile', '');
            $nombre         = Input::get('nombre', '');
            $descripcion    = Input::get('descripcion', '');
            // validar permisos
            //var_dump('Proyectos/' . $nombre_archivo);
            //crear archivo
            if ($request->file('myFile') == null) {
                $path = "No hay archivo";
            }else{
            $path = $request->file('myFile')->store('Proyectos/' . strval($idproject));
                // crear registro de consulta
                DB::table('anexo')->insert(
                    ['NombreAnexo' => $nombre, 'Ruta'                     => $path,
                        'Descripcion'  => $descripcion, 'proyecto_idprotecto' => $idproject,
                        'created'      => $date_string, 'user'                => 625353]
                );
            }
        }elseif($operation == 'A'){
            DB::table('evaluacion')->insert(
                ['resultado' => 0, 'proyecto_idproyecto' => $idproject,
                'fecha' => $date_string, 'actualizacion' => $date_string]);
        }elseif($operation == 'D'){
            DB::table('anexo')->where('idAnexo', Input::get('idanexo', 0))->delete();
        }
        return Redirect::action('ProjectController@getDetailProject', array('proyectoid' => $idproject));
    }
}
