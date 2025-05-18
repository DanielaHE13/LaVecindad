<?php
class CuentaCobroDAO{
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
    
}
?>