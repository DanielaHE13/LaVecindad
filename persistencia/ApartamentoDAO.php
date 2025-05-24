<?php
class ApartamentoDAO
{
    private $idApartamento;
    private $torre;
    private $propietarioId;
    private $coeficiente;

    public function __construct($idApartamento = 0, $torre = '', $propietarioId = 0, $coeficiente = 0.0)
    {
        $this->idApartamento = $idApartamento;
        $this->torre = $torre;
        $this->propietarioId = $propietarioId;
        $this->coeficiente = $coeficiente;
    }

    public function consultar()
    {
        return "SELECT Propietario_IdPropietario, Coeficiente
                FROM apartamento
                WHERE IdApartamento = '" . $this->idApartamento . "'
                  AND Torre = '" . $this->torre . "'";
    }

    public function consultarTodos()
    {
        return "SELECT IdApartamento, Torre, Propietario_IdPropietario, Coeficiente
                FROM apartamento";
    }

    public function obtenerPorId($id)
    {
        return "SELECT * FROM apartamento WHERE IdApartamento = $id";
    }

    public function obtenerPorTorre($torre)
    {
        return "SELECT * FROM apartamento WHERE Torre = '$torre'";
    }

    public function obtenerPorPropietario($propietarioId)
    {
        return "SELECT * FROM apartamento WHERE Propietario_IdPropietario = $propietarioId";
    }

    public function obtenerPorCoeficiente($coeficiente)
    {
        return "SELECT * FROM apartamento WHERE Coeficiente = $coeficiente";
    }

    public function insertar()
    {
        return "INSERT INTO apartamento (IdApartamento, Torre, Propietario_IdPropietario, Coeficiente)
                VALUES ('" . $this->idApartamento . "', '" . $this->torre . "', '" . $this->propietarioId . "', '" . $this->coeficiente . "')";
    }

    public function actualizar()
    {
        return "UPDATE apartamento
                SET Propietario_IdPropietario = '" . $this->propietarioId . "',
                    Coeficiente = '" . $this->coeficiente . "'
                WHERE IdApartamento = '" . $this->idApartamento . "'
                  AND Torre = '" . $this->torre . "'";
    }

    public function eliminar()
    {
        return "DELETE FROM apartamento
                WHERE IdApartamento = '" . $this->idApartamento . "'
                  AND Torre = '" . $this->torre . "'";
    }
}
?>
