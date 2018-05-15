<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SessionService;
use Illuminate\Support\Facades\Input;
use DB;
use Hash;

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
        $results = DB::select("select correo, nombres, apellidos, password from usuario where correo=? and estado='A'", array($username));
        if(count($results) > 0){
            if (Hash::check($password, '$hashedPassword'))
            {
                $this->session->createSession($username);
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
                'apellidos' => $input["apellidos"], 'tel' => '00000', 'codigo' => 6253530,
                'password' => $password, 'tipo' => $input["rol"], 'created' => $date_string, 'status' => 1]
            );
            return view('auth/register-ok')->with('session', $this->session->getSession());
        }
    }
}
