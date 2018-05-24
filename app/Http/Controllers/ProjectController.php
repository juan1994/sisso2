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

    public function updateProyect()
    {
        $proyecto = DB::select('select  @rownum:=@rownum+1 AS rownum, `idproyecto`,`nombreProyecto`,`fechaRegistro`,`fechaInicio`,`fechaFinalizacion`,`presuesto`,`problacionBeneficiada`,`nombreResponsable`,`descripcion`,`objetivoGeneral`,`tipoModalidad_idtipoModalidad`,`EstadoProyecto` from `proyecto`');
        //var_dump($proyecto);
        return view('proyecto-actualizar')->with('session', $this->session->getSession())->with('proyecto', $proyecto);
    }

    public function getDetailProject()
    {
        $proyectoid = Input::get('proyectoid', 0);
        $proyecto   = DB::select('select  @rownum:=@rownum+1 AS rownum,
                `idproyecto`,`nombreProyecto`,`fechaRegistro`,`fechaInicio`,`fechaFinalizacion`,`presuesto`,`problacionBeneficiada`,`nombreResponsable`,`descripcion`,`objetivoGeneral`,`tipoModalidad_idtipoModalidad`,`EstadoProyecto` from `proyecto` where idproyecto=?', array($proyectoid));
            
        $proyectoAnexo = DB::select('select  @rownum:=@rownum+1 AS rownum, 
                `NombreAnexo`,`Descripcion`, `Ruta` FROM `anexo` where `proyecto_idprotecto`=?', array($proyectoid));


        $proyectoEvaluacion = DB::select('select  idevaluacion,
                `resultado`, `fecha`, `actualizacion`FROM `evaluacion` where `proyecto_idproyecto`=?', array($proyectoid));

        
        $result = app('App\Http\Controllers\EvaluationItemController')->getCountMatriz($proyectoid);
        var_dump($result);
        return view('proyecto-detalle')->with('session', $this->session->getSession())->with('proyecto', $proyecto)->with('proyectoAnexo', $proyectoAnexo)->with('proyectoEvaluacion', $proyectoEvaluacion);

    }

    public function getproyectregister()
    {
        return view('proyecto-registrar')->with('session', $this->session->getSession())->with('status', 'C');

       //return view('proyecto-detalle')->with('session', $this->session->getSession())->with('proyecto', $proyecto)->with('proyectoAnexo', $proyectoAnexo)->with('proyectoEvaluacion', $proyectoEvaluacion);
       

    }

    /**
     * Mostrar formulario de creación
     */
    public function get()
    {
        return view('proyecto-registrar')->with('session', $this->session->getSession())->with('status', 'C');
    }
    public function create()
    {
        // pasar datos a estrcutura
        $data = request()->all();
        //var_dump($data);
        //guardar datos
        //devolver resultado
        try {
            $res = DB::insert('insert into name_table (id, name) values (?, ?)',
                [request('NombreProyecto'), request('FechaInicio')]);
        } catch (\Illuminate\Database\QueryException $e) {
            //dd($e);
        } catch (PDOException $e) {
            dd($e);
        }
        return view('proyecto-registrar')->with('session', $this->session->getSession());
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
        return Storage::download($pathfile);
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
