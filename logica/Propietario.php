<?php
require_once("../persistencia/Conexion.php");
require_once("../logica/Persona.php");
require_once("../persistencia/PropietarioDAO.php");

class Propietario extends Persona
{
    public function __construct($id = "", $nombre = "", $apellido = "", $correo = "", $clave = "", $telefono = "")
    {
        parent::__construct($id, $nombre, $apellido, $correo, $clave, $telefono);
    }

    public function autenticar()
    {
        $conexion = new Conexion();
        $propietarioDAO = new PropietarioDAO("", "", "", $this->correo, $this->clave);
        $conexion->abrir();
        $conexion->ejecutar($propietarioDAO->autenticar());

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
        $propietarioDAO = new PropietarioDAO($this->id);
        $conexion->abrir();
        $conexion->ejecutar($propietarioDAO->consultar());
        $datos = $conexion->registro();

        if ($datos) {
            $this->nombre = $datos[0];
            $this->apellido = $datos[1];
            $this->correo = $datos[2];
            $this->telefono = isset($datos[3]) ? $datos[3] : "";
            // si tienes otros campos, los asignas igual aquí
        }

        $conexion->cerrar();
    }

    public static function consultarTodos()
    {
        $conexion = new Conexion();
        $propietarioDAO = new PropietarioDAO();
        $conexion->abrir();

        $conexion->ejecutar($propietarioDAO->consultarTodos());

        $lista = [];

        while ($datos = $conexion->registro()) {
            $propietario = new Propietario();
            $propietario->id = $datos[0];
            $propietario->nombre = $datos[1];
            $propietario->apellido = $datos[2];
            $propietario->correo = $datos[3];
            $propietario->telefono = isset($datos[4]) ? $datos[4] : "";

            $lista[] = $propietario;
        }

        $conexion->cerrar();
        return $lista;
    }
}
