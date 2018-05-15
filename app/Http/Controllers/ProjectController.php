<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Services\SessionService;
use DB;
use Storage;
use File;
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


    public function getDetailProject()
    {
        $proyectoid = Input::get('proyectoid', 0);
            $proyecto = DB::select('select  @rownum:=@rownum+1 AS rownum, 
                `idproyecto`,`nombreProyecto`,`fechaRegistro`,`fechaInicio`,`fechaFinalizacion`,`presuesto`,`problacionBeneficiada`,`nombreResponsable`,`descripcion`,`objetivoGeneral`,`tipoModalidad_idtipoModalidad`,`EstadoProyecto` from `proyecto` where idproyecto=?', array($proyectoid));
            
        $proyectoAnexo = DB::select('select  @rownum:=@rownum+1 AS rownum, 
                `NombreAnexo`,`Descripcion` FROM `anexo` where `proyecto_idprotecto`=?', array($proyectoid));

        $proyectoEvaluacion = DB::select('select  @rownum:=@rownum+1 AS rownum, 
                `resultado`, `fecha`, `actualizacion`FROM `evaluacion` where `proyecto_idproyecto`=?', array($proyectoid));

        
       return view('proyecto-detalle')->with('session', $this->session->getSession())->with('proyecto', $proyecto)->with('proyectoAnexo', $proyectoAnexo)->with('proyectoEvaluacion', $proyectoEvaluacion);
       
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
        return view('proyecto-registrar')->with('session', $this->session->getSession());;
    }
    /**
     * Operación sobre el proyecto
     * Eliminar - Actualizar
     */
    public function operation()
    {

    }
    /**
     * Operaciones - Archivos
     */
    public function getFile(Request $request)
    {
        $pathfile = Input::get('pathfile', '');
        return Storage::download($pathfile);
    }
    public function createFile(Request $request)
    {
        $nombre_archivo = Input::get('myFile', '');
        $nombre = Input::get('nombre', '');
        $descripcion = Input::get('descripcion', '');
        $idproject = Input::get('idproject', '');
        $date_string = date("Y/m/d h:i");
        // validar permisos

        //crear archivo
        if ($request->file('myFile') == null) {
            $path = "No hay archivo";
        }else{
           $path = $request->file('myFile')->store('Proyectos/' . $nombre_archivo);  
            //$size = Storage::size($path);
            // crear registro de consulta
            DB::table('anexo')->insert(
                ['NombreAnexo' => $nombre, 'Ruta' => $path, 
                'Descripcion' => $descripcion, 'proyecto_idprotecto' => $idproject, 
                'created' => $date_string, 'user'=> 625353]
            );
        }
    }
}
