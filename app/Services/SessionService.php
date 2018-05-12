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
        $user = new UserSession();
        $user->status = 2;
        return $user;
    }
}
