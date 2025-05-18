<?php

abstract class Persona{
    protected $id;
    protected $nombre;
    protected $apellido;
    protected $correo;
    protected $telefono;
    protected $fechaNacimiento;

    public function __construct($id="", $nombre="", $apellido="", $correo="", $telefono="", $fechaNacimiento=""){
        $this->idPersona = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->telefono = $telefono;
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function getFechaNacimiento(){
        return $this->fechaNacimiento;
    }

}
?>