<?php
session_start();
require_once('../logica/Propietario.php');
require_once('../logica/Apartamento.php');
require_once('../logica/Administrador.php');
require_once("../logica/Estado.php");
require_once ("../logica/CuentaCobro.php");


if (($_SESSION["rol"] != "propietario")) {
    header("Location: /phpmyadmin/lavecindad/index.php");
    exit();
}

include("MenuPropietario.php");
?>
