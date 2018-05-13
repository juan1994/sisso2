<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Services\SessionService;
use DB;
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

    public function detailProyect()
    {
        $proyecto = DB::select('select  `idproyecto`,`nombreProyecto`,`fechaRegistro`,`fechaInicio`,`fechaFinalizacion`,`presuesto`,`problacionBeneficiada`,`nombreResponsable`,`descripcion`,`objetivoGeneral`,`tipoModalidad_idtipoModalidad`,`EstadoProyecto` from `proyecto`');
        //var_dump($proyecto);
        return view('proyecto-detalle')->with('session', $this->session->getSession())->with('proyecto', $proyecto);
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
    
}
