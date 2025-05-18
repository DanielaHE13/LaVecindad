<?php
class AdministradorDAO{
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $telefono;
    private $fechaNacimiento;

    public function __construct($id="", $nombre="", $apellido="", $correo="", $telefono="", $fechaNacimiento=""){
        $this->idPersona = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->telefono = $telefono;
        $this->fechaNacimiento = $fechaNacimiento;
    }
}
?>