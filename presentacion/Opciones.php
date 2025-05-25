<?php if(($_SESSION["rol"]) == "administrador"){?>
    <li class="nav-item">
        <a href="SesionAdministrador.php?administrador=1" class="nav-link text-white">Crear Cuentas de Cobro</a>
    </li>
    <li>
        <a href="SesionAdministrador.php?administrador=2" class="nav-link text-white">Consultar Cuentas de Cobro</a>
    </li>
    <li>
        <a href="SesionAdministrador.php?administrador=3" class="nav-link text-white">Consultar Propietarios</a>
    </li>
    <li>
        <a href="SesionAdministrador.php?administrador=4" class="nav-link text-white">Consultar Apartamentos</a>
    </li>
<?php
}else{?>
    <li class="nav-item">
        <a href="SesionPropietario.php?propietario=1" class="nav-link text-white">Pagar Cuentas de Cobro</a>
    </li>
    <li>
        <a href="SesionPropietario.php?propietario=2" class="nav-link text-white">Consultar Cuentas de Cobro</a>
    </li>
    <li>
        <a href="SesionPropietario.php?propietario=3" class="nav-link text-white">Consultar Mis Apartamentos</a>
    </li>
    <li>
        <a href="SesionPropietario.php?propietario=4" class="nav-link text-white">Historial de Facturas</a>
    </li>
<?php }?>