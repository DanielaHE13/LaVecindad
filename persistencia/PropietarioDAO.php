<?php
class PropietarioDAO {
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $telefono;

    public function __construct($id = 0, $nombre = "", $apellido = "", $correo = "", $clave = "", $telefono = "") {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->clave = $clave;
        $this->telefono = $telefono;
    }

    public function autenticar() {
        return "SELECT idPropietario
                FROM Propietario
                WHERE correo = '" . $this->correo . "' 
                  AND clave = SHA2('" . $this->clave . "', 256)";
    }

    public function consultar() {
        return "SELECT nombre, apellido, correo, telefono
                FROM Propietario
                WHERE idPropietario = '" . $this->id . "'";
    }
}
?>
