<?php
require_once 'ModeloBase.php';

class Usuario extends ModeloBase
{
    public $nombre;
    public $apellidos;
    public $email;
    public $password;

    public function __construct() {
        parent::__construct();
    }

    //GET & SET
    function getNombre($nombre)
    {
        return $this->nombre;
    }

    function getApellidos($apellidos)
    {
        return $this->apellidos;
    }

    function getEmail($email)
    {
        return $this->email;
    }

    function getPassword($password)
    {
        return $this->password;
    }

    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }

    function setPassword($password)
    {
        $this->password = $password;
    }

}