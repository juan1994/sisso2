<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use DB;
use App\Quotation;

class UserController extends Controller
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

    public function get()
    {

            $usuario = DB::select('select  @rownum:=@rownum+1 AS rownum, 
                `codigo`,`nombres`,`apellidos`,`celular`,`correo`,`tipo_idTipo`,`estado` from `usuario`');
       return view('usuario-listar')->with('usuario', $usuario); 
        
    }

    public function detailUser()
    {
       
            $usuario = DB::select('select  @rownum:=@rownum+1 AS rownum, 
                `codigo`,`nombres`,`apellidos`,`celular`,`correo`,`tipo_idTipo`,`estado` from `usuario`');
       return view('usuario-detalle')->with('usuario', $usuario); 
    }
}
