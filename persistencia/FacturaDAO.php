<?php
class FacturaDAO{
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


}
?>