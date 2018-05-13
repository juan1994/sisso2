<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Services\SessionService;
use DB;
use App\Quotation;

class UserController extends Controller
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

    public function get()
    {

            $usuario = DB::select('select  @rownum:=@rownum+1 AS rownum, 
                `codigo`,`nombres`,`apellidos`,`celular`,`correo`,`tipo_idTipo`,`estado` from `usuario`');
       return view('usuario-listar')->with('session', $this->session->getSession())->with('usuario', $usuario); 
        
    }

    public function detailUser()
    {
        $userid = Input::get('userid', 0);
            $usuario = DB::select('select  @rownum:=@rownum+1 AS rownum, 
                `codigo`,`nombres`,`apellidos`,`celular`,`correo`,`tipo_idTipo`,`estado` from `usuario` where codigo=?', array($userid));
       return view('usuario-detalle')->with('session', $this->session->getSession())->with('usuario', $usuario); 
    }
}
