<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SessionService;
use Illuminate\Support\Facades\Input;
use DB;
use Hash;
use Mail;

class AuthController extends Controller
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

    public function getLogin(Request $request)
    {
        return view('auth/login')->with('session', $this->session->getSession())->with('errcount', 0);
    }

    public function getLogout(Request $request)
    {
        $this->session->removeSession($request);
        return redirect()->route('home');
    }
    
    public function getRegister(Request $request)
    {
        $kinds = DB::select("select idTipo as id, nombreTipo as detalle  from tipo order by idTipo");
        return view('auth/register')->with('session', $this->session->getSession())
        ->with('kinds', $kinds);
    }
    public function login(Request $request)
    {
        $username = trim(Input::get('username', ''));
        $password = Input::get('password', '');
        $errcount = Input::get('errcount', 0);
        $errors = array();
        $results = DB::select("select correo, nombres, apellidos, password, codigo, tipo_idTipo from usuario where correo=? and estado='A'", array($username));
        if(count($results) > 0){
            if (Hash::check($password, $results[0]->password))
            {
                $this->session->createSession($username, $results[0]->codigo, $results[0]->tipo_idTipo);
                return redirect()->route('home');
            }else{
                $errcount += 1;
                if($errcount >= 3){
                    $errcount = 0;
                    $errors['count'] = 'Usuario Bloqueado por reintentos, consulte con el administrador.';
                    DB::table('usuario')
                    ->where('correo', $username)
                    ->update(['estado' => 'B']);
                }else{
                    $errors['password'] = 'Contraseña incorrecta.';
                }
                return view('auth/login')->with('session', $this->session->getSession())
                ->with('errors', $errors)->with('errcount', $errcount)->with('username', $username);
            }
        }else{
            $errors['user'] = 'Usuario no encontrado o se encuentra bloqueado.';
            return view('auth/login')->with('session', $this->session->getSession())
            ->with('errors', $errors)->with('errcount', $errcount)->with('username', $username);
        }
    }
    public function createUser(Request $request)
    {
        $kinds = DB::select("select idTipo as id, nombreTipo as detalle  from tipo order by idTipo");
        $input = Input::all();
        $password = Hash::make($input["contrasena"]);
        $date_string = date("Y/m/d h:i");
        $errors = array();
        $count_user = DB::select("select count(*) as count from usuario where correo=?", array($input["correo"]));
        if($count_user[0]->count > 0){
            $errors["exist_user"] = "El usuario esta en uso, consulte con el administrador."; 
            return view('auth/register')->with('session', $this->session->getSession())
            ->with('kinds', $kinds)->with('errors', $errors)->with('input', $input);
        }else{
            DB::table('usuario_temporal')
            ->where('correo', $input["correo"])
            ->where('status', 1)
            ->update(['status' => 0]);
            DB::table('usuario_temporal')->insert(
                ['correo' => $input["correo"], 'nombres' => $input["nombres"], 
                'apellidos' => $input["apellidos"], 'tel' => $input["celular"], 'codigo' => $input["codigo"],
                'password' => $password, 'tipo' => $input["rol"], 'created' => $date_string, 'status' => 1]
            );
            return view('auth/register-ok')->with('session', $this->session->getSession());
        }
    }

    public function getusertemp()
    {
        $usuarioTemporal = self::getListUserTemp();
        return view('usuario-solicitud')->with('session', $this->session->getSession())
        ->with('usuarioTemporal', $usuarioTemporal);
    }

    public function createUserTemp(Request $request){
        $input = Input::all();
        $action = Input::get('action', '');
        if($action == 'A'){
            DB::transaction(function () {
                $id = Input::get('id', 0);
                $usuario = DB::select("select  `usuario_temporal`.`codigo`,`usuario_temporal`.`nombres`,`usuario_temporal`.`apellidos`,`usuario_temporal`.`tel`,`usuario_temporal`.`correo`,`usuario_temporal`.`tipo`,'A',`usuario_temporal`.`password` FROM sisso.usuario_temporal where status=1 and id=?", array($id));
                DB::table('usuario')->insert(
                    ['codigo' => $usuario[0]->codigo, 'nombres' => $usuario[0]->nombres, 
                    'apellidos' => $usuario[0]->apellidos, 'celular' => $usuario[0]->tel, 'correo' => $usuario[0]->correo, 'tipo_idTipo' => $usuario[0]->tipo, 'estado' => 'A', 'password' => $usuario[0]->password]
                );
                DB::table('usuario_temporal')
                ->where('id', $id)
                ->update(['status' => 0, 'password' => '']);
                $message = "El usuario " . $usuario[0]->correo . " ha sido creado por el administrador";
                $title = "Creación de usuario";
                $content = $message;
                Mail::send('emails.send', ['title' => $title, 'content' => $content], function ($message) use ($usuario)
                {
                    $message->to($usuario[0]->correo);
                    $message->subject("Creación usuario Sistema de Trabajos Sociales");
                });
            });
        }elseif($action == 'R'){
            $id = Input::get('id', 0);
            DB::table('usuario_temporal')
            ->where('id', $id)
            ->update(['status' => 2]);
        }
        /* */
        $usuarioTemporal = self::getListUserTemp();
        return view('usuario-solicitud')->with('session', $this->session->getSession())
        ->with('usuarioTemporal', $usuarioTemporal);
    }
    private function getListUserTemp(){
        $usuarioTemporal = DB::select('select  @rownum:=@rownum+1 AS rownum, `id`, `correo`, `nombres`, `apellidos`, `tel`, `codigo`, `password`, `tipo`, `created`, `status` FROM sisso.usuario_temporal where status=1 ');
        return $usuarioTemporal;
    }

    public function getReset(){
        return view('auth/email')->with('session', $this->session->getSession())
        ->with('errors', array())->with('result', array())->with('email', '');
    }
    public function operationReset(){
        $errors = array();
        $result = array();
        $email = Input::get('email', '');
        $date_string = date("Y/m/d h:i");
        $url_email = env("URL_EMAIL_RESET", "correo no configurado");
        $token = uniqid('Uco', true);
        $results_user = DB::select("select codigo from usuario where correo=? and estado='A'", array($email));
        if(count($results_user) > 0){
            DB::table('token_usuario')
            ->where('user', $results_user[0]->codigo)
            ->where('action', 'R')
            ->where('status', 1)
            ->update(['status' => 0]);

            DB::table('token_usuario')->insert([
                'action' => 'R', 'token' => $token, 'status' => 1, 
                'created' => $date_string, 'user' => $results_user[0]->codigo]);

            $result['email'] = "solicitud creada";
            $message = "Usuario " . $results_user[0]->codigo . " ingresa al siguiente link para restablecer la contraseña: "
                . $url_email . '?id=' . $token;
            $title = "Restablecer contraseña";
            $content = $message;
            Mail::send('emails.send', ['title' => $title, 'content' => $content], function ($message) use ($email)
            {
                $message->to($email);
                $message->subject("Restablecer contraseña - Sistema de Trabajos Sociales");
            });
            $email='';
        }else{
            $errors['email'] = "usuario no encontrado";
        }

        return view('auth/email')->with('session', $this->session->getSession())
        ->with('errors', $errors)->with('result', $result)->with('email', $email);
    }

    public function getResetPassword(){
        $token = Input::get('id', '');
        $errors = array();
        $results_user = DB::select("select id from token_usuario where token=? and status=1", array($token));
        if(count($results_user) > 0){

        }else{
            $errors['token'] = "Token invalido";
        }
        return view('auth/reset')->with('session', $this->session->getSession())
        ->with('errors', $errors)->with('result', array())->with('token', $token);
    }
    public function operationResetPassword(){
        $errors = array();
        $result = array();
        $token = Input::get('token', '');
        $date_string = date("Y/m/d h:i");
        $results_user = DB::select("select user from token_usuario where token=? and status=1", array($token));
        if(count($results_user) > 0){
            $password = Hash::make(Input::get('password', ''));
            DB::table('usuario')
            ->where('codigo', $results_user[0]->user)
            ->where('estado', 'A')
            ->update(['password' => $password]);
            DB::table('token_usuario')
            ->where('token', $token)
            ->where('status', 1)
            ->update(['status' => 0, 'token' => '', 'used' => $date_string]);
            $result['user'] = "Contraseña cambiar exitosamente";
        }else{
            $errors['user'] = "Error al cambiar la contraseña";
        }
        return view('auth/reset')->with('session', $this->session->getSession())
        ->with('errors', $errors)->with('result', $result)->with('token', '');
    }

}
