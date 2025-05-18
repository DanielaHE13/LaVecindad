<?php
class Propietario extends Persona {
    public function __construct($id="", $nombre="", $apellido="", $correo="", $telefono="", $fechaNacimiento="") {
        parent::__construct($id, $nombre, $apellido, $correo, $telefono, $fechaNacimiento);
    }
}
?>