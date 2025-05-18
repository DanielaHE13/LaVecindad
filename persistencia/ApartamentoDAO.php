<?php
class ApartamentoDAO{
    private $id;
    private $torre;
    private $propietario;
    private $coeficiente;

    public function __construct($id="", $torre="", $propietario="", $coeficiente=""){
        $this->id = $id;
        $this->torre = $torre;
        $this->propietario = $propietario;
        $this->coeficiente = $coeficiente;
    }

    public function getId(){
        return $this->id;
    }

    public function getTorre(){
        return $this->torre;
    }

    public function getPropietario(){
        return $this->propietario;
    }

    public function getcoeficiente(){
        return $this->coeficiente;
    }
}
?>