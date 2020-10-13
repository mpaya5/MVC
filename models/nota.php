<?php
require_once 'ModeloBase.php';

class Nota extends ModeloBase
{
    public $usuario_id;
    public $titulo;
    public $descripcion;

    public function __construct() {
        parent::__construct();
    }

    public function getUsuario_id()
    {
        return $this->usuario_id;
    }

    public function setUsuario_id($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function guardar()
    {
        $sql = "INSERT INTO notas(usuario_id, titulo, descripcion, fecha) VALUES ({$this->usuario_id}, '{$this->titulo}', '{$this->descripcion}', CURDATE());";
        
        $guardado = $this->db->query($sql);
        return $guardado;
    }
}