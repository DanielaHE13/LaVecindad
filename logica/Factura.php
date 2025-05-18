<?php
class Factura{
    private $id;
    private $cuentaCobro;
    private $propietario;
    private $fechaPago;
    private $valorPagado;
    private $valorFactura;
    private $horaPago;

    public function __construct($id="",$cuentaCobro="",$propietario="",$fechaPago="",$valorPagado="",$valorFactura="",$horaPago="") {
        $this->id = $id;
        $this->cuentaCobro = $cuentaCobro;
        $this->propietario = $propietario;
        $this->fechaPago = $fechaPago;
        $this->valorPagado = $valorPagado;
        $this->valorFactura = $valorFactura;
        $this->horaPago = $horaPago;
    }

    public function getId() {
        return $this->id;
    }

    public function getCuentaCobro() {
        return $this->cuentaCobro;
    }

    public function getPropietario() {
        return $this->propietario;
    }

    public function getFechaPago() {
        return $this->fechaPago;
    }

    public function getValorPagado() {
        return $this->valorPagado;
    }

    public function getValorFactura() {
        return $this->valorFactura;
    }

    public function getHoraPago() {
        return $this->horaPago;
    }

}
?>