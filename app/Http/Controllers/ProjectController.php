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
        $proyectoid = Input::get('proyectoid', 0);
        $proyecto   = DB::select('select
                `idproyecto`,`nombreProyecto`,`fechaRegistro`,`fechaInicio`,`fechaFinalizacion`,`presuesto`,`problacionBeneficiada`,`nombreResponsable`,`descripcion`,`objetivoGeneral`,`tipoModalidad_idtipoModalidad`,`EstadoProyecto` from `proyecto` where idproyecto=?', array($proyectoid));
        $proyectoAnexo = DB::select('select
                `NombreAnexo`,`Descripcion`, `Ruta` FROM `anexo` where `proyecto_idprotecto`=?', array($proyectoid));
        $proyectoEvaluacion = DB::select('select  idevaluacion,
                `resultado`, `fecha`, `actualizacion`FROM `evaluacion` where `proyecto_idproyecto`=?', array($proyectoid));
        $result = app('App\Http\Controllers\EvaluationItemController')->getCountMatriz($proyectoid);
        return view('proyecto-detalle')->with('session', $this->session->getSession())->with('proyecto', $proyecto)->with('proyectoAnexo', $proyectoAnexo)->with('proyectoEvaluacion', $proyectoEvaluacion);
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
            try {
                $idProject = DB::table('proyecto')->insertGetId(
                    ['nombreProyecto' => $data['NombreProyecto'], 'fechaRegistro' => $date_string, 
                    'fechaInicio' => $data['FechaInicio'], 'fechaFinalizacion' => $data['FechaFinalizacion'], 'presuesto' => $data['Presupuesto'], 
                    'problacionBeneficiada' => $data['PoblacionBeneficiada'], 'nombreResponsable' => $data['NombreResponsable'],
                    'descripcion' => $data['BreveDescripcion'],'objetivoGeneral' => $data['ObjetivoGeneral'],
                    'tipoModalidad_idtipoModalidad' => $data['TipoModalidad'],'EstadoProyecto' => 0 ]);
                $res = DB::table('usuario_has_proyecto')->insert(
                    ['usuario_codigo' => $session_user->code, 'protecto_idprotecto' => $idProject]);
            } catch (PDOException $e) {
                dd($e);
            }
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
        }
        return Redirect::action('ProjectController@getDetailProject', array('proyectoid' => $idproject));
    }
}
