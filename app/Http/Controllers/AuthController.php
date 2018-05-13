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
        return view('auth/register')->with('session', $this->session->getSession());
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
        $password = Hash::make('secret');
        return view('auth/register')->with('session', $this->session->getSession());
    }
}
