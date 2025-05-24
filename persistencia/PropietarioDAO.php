<?php
class PropietarioDAO
{
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $telefono;

    public function __construct($id = 0, $nombre = "", $apellido = "", $correo = "", $clave = "", $telefono = "")
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->clave = $clave;
        $this->telefono = $telefono;
    }

    public function autenticar(){
        return "select idPropietario
                from Propietario 
                where correo = '" . $this -> correo . "' and clave = '" . $this -> clave . "'";
    }

    public function consultar()
    {
        return "SELECT nombre, apellido, correo, NumeroTelefono
                FROM Propietario
                WHERE idPropietario = '" . $this->id . "'";
    }

}
?>
