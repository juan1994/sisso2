<?php

namespace App\DTO;

class UserSession
{
    /**
     * An indentifier
     * @var string 
     */
    public $name;
     /**
     * An indentifier
     * @var integer
     */
    public $code;
    /**
     * An indentifier
     * @var string
     */
    public $rol;
    /**
     * An indentifier
     * @var integer
     */
    public $status;

    public function __construct()
    {
        $this->name = "";
        $this->code = 0;
        $this->rol = "";
        $this->status = 0;
    }
}
