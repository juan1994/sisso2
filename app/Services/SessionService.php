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
    public function createSession($username, $code,  $type)
    {
        $user = new UserSession();
        $user->name = $username;
        $user->code = $code;
        $user->status = 1;
        $user->rol = $type;
        session(['user_session' => $user]);
    }
    public function removeSession($request)
    {
        //$request->session()->forget('key');
        $request->session()->flush();
    }
    public function validatePermission($idview){
        $session = self::getSession();
        switch ($idview) {
            case 'PRCR':
                if($session->status != 0 && ($session->rol == '3' || $session->rol == '4')){
                    return true;
                }else{
                    return false;
                }
                break;
            case 'PRUP':
                if($session->status != 0 && ($session->rol == '3' || $session->rol == '4')){
                    return true;
                }else{
                    return false;
                }
                break;
            default:
                return true;
                break;
        }
    }
}
