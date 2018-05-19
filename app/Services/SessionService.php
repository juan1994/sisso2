<?php

namespace App\Services;
use App\DTO\UserSession;

class SessionService
{
    /*
    public __construct(){

    }*/

    public function isSession()
    {
        return true;
    }
    
    public function getSession()
    {
        $user = session('user_session');
        //var_dump($user);
        if(is_null($user)){
            $user = new UserSession();
        }
        return $user;
    }
    public function createSession($username, $type)
    {
        $user = new UserSession();
        $user->name = $username;
        $user->status = 1;
        $user->rol = $type;
        session(['user_session' => $user]);
    }
    public function removeSession($request)
    {
        //$request->session()->forget('key');
        $request->session()->flush();
    }
}
