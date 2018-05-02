<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use DB;
use App\Quotation;

class ProjectController extends Controller
{

      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }
    /**
     * Listado de proyectos
     */
    public function getList()
    {
        $results = DB::select('select * from usuario where codigo = ?', array(request('name')));
        var_dump($results);
        return view('proyecto-listar')->with('status', 'C');
    }
    /**
     * Mostrar formulario de creación
     */
    public function get()
    {
        return view('proyecto-registrar')->with('status', 'C');
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
        return view('proyecto-registrar');
    }
    /**
     * Operación sobre el proyecto
     * Eliminar - Actualizar
     */
    public function operation()
    {

    }
}
