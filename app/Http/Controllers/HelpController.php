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

class HelpController extends Controller
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

    public function get(Request $request)
    {
        return view('help')->with('session', $this->session->getSession())
        ->with('path', '');
    }
    public function create(Request $request)
    {
        // debug for object
        //$input = Input::all();
        //dd($input);
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
                'created' => $date_string, 'user'=> 62535]
            );
        }
        return view('help')->with('session', $this->session->getSession())
        ->with('path',$path);
    }
}
