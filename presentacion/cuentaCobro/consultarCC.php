<?php

$cuentaCobro = new CuentaCobro();
$cuentasCobro = $cuentaCobro-> consultar();

echo "<table class='table table-bordered table-striped mt-3'>
        <thead class='table-success'>
            <tr>
                <th>IdCuentaCobro</th>
                <th>Administrador</th>
                <th>Apartamento</th>
                <th>Estado</th>
                <th>FechaVencimiento</th>
                <th>SaldoAcomulado</th>
                <th>Interes</th>	

            </tr>
        </thead>
        <tbody>";
    foreach ($cuentasCobro as $m) {
        echo "<tr>
                    <td>" . $m->getId() . "</td>
                    <td>" . $m->getAdministrador() -> getNombre() . $m->getAdministrador() -> getApellido() . "</td>
                    <td>" . $m->getApartamento() -> getId() . "</td>
                    <td>" . $m->getEstado() -> getEstado(). "</td>
                    <td>" . $m->getFechaVencimiento() . "</td>
                    <td>" . $m->getSaldoAcumulado() . "</td>
                    <td>" . $m->getInteres() . "</td>
            </tr>";
    }
    echo "</tbody></table>";    
?>