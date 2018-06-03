<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Services\SessionService;
use DB;
use Hash;
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
    public function getKind()
    {
        $kinds = DB::select("select idTipo as id, nombreTipo as detalle  from tipo order by idTipo");
        return $kinds;
    }
    public function getUser($userid)
    {
        $usuario = DB::select('select `codigo`,`nombres`,`apellidos`,`celular`,`correo`,`tipo_idTipo`,`estado`, password from `usuario` where codigo=?', array($userid));
        return $usuario;
    }
    public function getDetailUser()
    {
        $data_session = $this->session->getSession();
        $userid = Input::get('userid', 0);
        if($data_session->status !== 1){
            return redirect('/');
        }elseif(intval($data_session->code) !== intval($userid) && $data_session->rol !== 1){
            return redirect('/');
        }else{            
            $usuario = self::getUser($userid);
            $kinds = self::getKind();
            return view('usuario-actualizar')->with('session', $this->session->getSession())
            ->with('kinds', $kinds)->with('usuario', $usuario[0])->with('errors', array())->with('results', array());
        }
    }
    public function operationUser(){
        $session_user = $this->session->getSession();
        $input = Input::all();
        $usuario = self::getUser($input['codigo']);
        $kinds = self::getKind();
        $update_paswd = 0;
        $errors = array();
        $results = array();
        if($input['codigo'] == $session_user->code){
            if(strlen($input['contrasena-ant'])>=8 && strlen($input['contrasena'])>=8){
                if(Hash::check($input['contrasena-ant'], $usuario[0]->password)){
                    $update_paswd = 1;
                }else{
                    $update_paswd = 2;
                }
            }
        }
        if($update_paswd == 0){
            DB::table('usuario')
            ->where('codigo', $input["codigo"])
            ->update(['nombres' => $input["nombres"], 'apellidos' => $input["apellidos"], 
            'celular' => $input["celular"]]);
            $results['user'] = 'Usuario Actualizado';
            $usuario = self::getUser($input['codigo']);
        }elseif($update_paswd == 1){
            $new_password = $password = Hash::make($input['contrasena']);
            DB::table('usuario')
            ->where('codigo', $input["codigo"])
            ->update(['nombres' => $input["nombres"], 'apellidos' => $input["apellidos"], 
            'celular' => $input["celular"], 'password' => $new_password]);
            $results['user'] = 'Usuario Actualizado';
            $usuario = self::getUser($input['codigo']);
        }elseif($update_paswd == 2){
            $errors['password_user'] = 'Contraseña invalida';
        }
        return view('usuario-actualizar')->with('session', $this->session->getSession())
            ->with('kinds', $kinds)->with('usuario', $usuario[0])->with('errors', $errors)->with('results', $results);
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
