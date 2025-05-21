<?php
require_once(__DIR__ . "/../persistencia/Conexion.php");
require_once(__DIR__ . "/../persistencia/AdministradorDAO.php");
require_once(__DIR__ . "/Persona.php");


class Administrador extends Persona
{

    public function __construct($id = "", $nombre = "", $apellido = "", $correo = "", $clave = "", $telefono = "")
    {
        parent::__construct($id, $nombre, $apellido, $correo, $clave, $telefono);
    }

    public function autenticar()
    {
        $conexion = new Conexion();
        $administradorDAO = new AdministradorDAO("", "", "", $this->correo, $this->clave);
        $conexion->abrir();
        $conexion->ejecutar($administradorDAO->autenticar());

        if ($conexion->filas() == 1) {
            $this->id = $conexion->registro()[0];
            $conexion->cerrar();
            return true;
        } else {
            $conexion->cerrar();
            return false;
        }
    }

    public function consultar()
    {
        $conexion = new Conexion();
        $administradorDAO = new AdministradorDAO($this->id);
        $conexion->abrir();
        $conexion->ejecutar($administradorDAO->consultar());
        $datos = $conexion->registro();

        if ($datos) {
            $this->nombre = $datos[0];
            $this->apellido = $datos[1];
            $this->correo = $datos[2];
            $this->telefono = isset($datos[3]) ? $datos[3] : "";
        }


        $conexion->cerrar();
    }
}
