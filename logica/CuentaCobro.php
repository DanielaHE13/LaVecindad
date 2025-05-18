<?php
require_once("persistencia/CuentaCobroDAO.php");
class CuentaCobro{
    private $id;
    private $administrador;
    private $apartamento;
    private $estado;
    private $fechaVencimiento;
    private $saldoAcumulado;
    private $interes;

    public function __construct($id="",$administrador="",$apartamento="",$estado="",$fechaVencimiento="", $saldoAcumulado= "", $interes= ""){
        $this->id = $id;
        $this->administrador = $administrador;
        $this->apartamento = $apartamento;
        $this->estado = $estado;
        $this->fechaVencimiento = $fechaVencimiento;
        $this->saldoAcumulado = $saldoAcumulado;
        $this->interes = $interes;
    }

    public function getId(){
        return $this->id;
    }

    public function getAdministrador(){
        return $this->administrador;
    }

    public function getApartamento(){
        return $this->apartamento;
    }

    public function getestado(){
        return $this->estado;
    }

    public function getFechaVencimiento(){
        return $this->fechaVencimiento;
    }

    public function getSaldoAcumulado(){
        return $this->saldoAcumulado;
    }

    public function getInteres(){
        return $this->interes;
    }
    
}
?>