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

    public function getDetailUser()
    {
        $data_session = $this->session->getSession();
        $userid = Input::get('userid', 0);
        $cview = Input::get('view', '');
        if($data_session->status !== 1){
            return redirect('/');
        }elseif(intval($data_session->code) !== intval($userid) && $data_session->rol !== 1){
            return redirect('/');
        }else{            
            $usuario = DB::select('select 
                    `codigo`,`nombres`,`apellidos`,`celular`,`correo`,`tipo_idTipo`,`estado` from `usuario` where codigo=?', array($userid));
            $kinds = DB::select("select idTipo as id, nombreTipo as detalle  from tipo order by idTipo");
            return view('usuario-actualizar')->with('session', $this->session->getSession())
            ->with('kinds', $kinds)->with('usuario', $usuario[0])->with('cview', $cview);
        }
    }
    public function operationUser(){
        $input = Input::all();
        DB::table('usuario')
            ->where('codigo', $input["codigo"])
            ->update(['nombres' => $input["nombres"], 'apellidos' => $input["apellidos"], 
            'celular' => $input["celular"]]);
        return redirect()->route('detalle-usuario', ['userid' => $input["codigo"],'view' => 'UUA']);
    }
    public function operationStatusUser(){
        $input = Input::all();
        $new_status = '';
        if($input["action"] == 'A'){
            $new_status = 'I';
        }elseif($input["action"] == 'I'){
            $new_status = 'A';
        }
        if($new_status != ''){
        DB::table('usuario')
            ->where('codigo', $input["code-user"])
            ->update([
                'estado' => $new_status
            ]);
        }
        return redirect()->route('usuarios', []);
    }

}
