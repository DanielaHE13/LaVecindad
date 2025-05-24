<?php
require_once(__DIR__ . "/../persistencia/ApartamentoDAO.php");
require_once(__DIR__ . "/../persistencia/Conexion.php");

class Apartamento {
    private $idApartamento;
    private $torre;
    private $propietarioId;
    private $coeficiente;

    public function __construct($idApartamento = null, $torre = null, $propietarioId = null, $coeficiente = null) {
        $this->idApartamento = $idApartamento;
        $this->torre = $torre;
        $this->propietarioId = $propietarioId;
        $this->coeficiente = $coeficiente;
    }

    // Getters y Setters...
    public function getIdApartamento() { return $this->idApartamento; }
    public function getTorre() { return $this->torre; }
    public function getPropietarioId() { return $this->propietarioId; }
    public function getCoeficiente() { return $this->coeficiente; }

    public function setIdApartamento($idApartamento) { $this->idApartamento = $idApartamento; }
    public function setTorre($torre) { $this->torre = $torre; }
    public function setPropietarioId($propietarioId) { $this->propietarioId = $propietarioId; }
    public function setCoeficiente($coeficiente) { $this->coeficiente = $coeficiente; }

    public function consultar() {
        $conexion = new Conexion();
        $apartamentoDAO = new ApartamentoDAO($this->idApartamento, $this->torre);
        $conexion->abrir();
        $conexion->ejecutar($apartamentoDAO->consultar());
        $datos = $conexion->registro();
        if ($datos) {
            $this->propietarioId = $datos[0];
            $this->coeficiente = $datos[1];
        }
        $conexion->cerrar();
    }

    public static function consultarTodos() {
        $conexion = new Conexion();
        $dao = new ApartamentoDAO();
        $conexion->abrir();
        $conexion->ejecutar($dao->consultarTodos());
        $resultados = [];
        while (($registro = $conexion->registro())) {
            $resultados[] = new Apartamento($registro[0], $registro[1], $registro[2], $registro[3]);
        }
        $conexion->cerrar();
        return $resultados;
    }

    public static function obtenerPorId($id) {
        $conexion = new Conexion();
        $dao = new ApartamentoDAO();
        $conexion->abrir();
        $conexion->ejecutar($dao->obtenerPorId($id));
        $registro = $conexion->registro();
        $conexion->cerrar();
        if ($registro) {
            return new Apartamento($registro[0], $registro[1], $registro[2], $registro[3]);
        }
        return null;
    }

    public static function obtenerPorTorre($torre) {
        $conexion = new Conexion();
        $dao = new ApartamentoDAO();
        $conexion->abrir();
        $conexion->ejecutar($dao->obtenerPorTorre($torre));
        $resultados = [];
        while ($fila = $conexion->registro()) {
            $resultados[] = new Apartamento($fila[0], $fila[1], $fila[2], $fila[3]);
        }
        $conexion->cerrar();
        return $resultados;
    }

    public static function obtenerPorPropietario($propietarioId) {
        $conexion = new Conexion();
        $dao = new ApartamentoDAO();
        $conexion->abrir();
        $conexion->ejecutar($dao->obtenerPorPropietario($propietarioId));
        $resultados = [];
        while ($fila = $conexion->registro()) {
            $resultados[] = new Apartamento($fila[0], $fila[1], $fila[2], $fila[3]);
        }
        $conexion->cerrar();
        return $resultados;
    }

    public static function obtenerPorCoeficiente($coeficiente) {
        $conexion = new Conexion();
        $dao = new ApartamentoDAO();
        $conexion->abrir();
        $conexion->ejecutar($dao->obtenerPorCoeficiente($coeficiente));
        $resultados = [];
        while ($fila = $conexion->registro()) {
            $resultados[] = new Apartamento($fila[0], $fila[1], $fila[2], $fila[3]);
        }
        $conexion->cerrar();
        return $resultados;
    }
}
?>
