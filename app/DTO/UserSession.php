<?php

namespace App\DTO;

class UserSession
{
    /**
     * An indentifier
     * @var string 
     */
    private $name;
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
        $this->rol = "";
        $this->status = 0;
    }
}
