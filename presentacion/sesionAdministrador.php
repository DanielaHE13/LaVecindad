<?php
session_start();
require_once('../logica/Administrador.php');
require_once('../logica/Apartamento.php');

if (($_SESSION["rol"] != "administrador")) {
    header("Location: /phpmyadmin/lavecindad/index.php");
    exit();
}
include("MenuAdministrador.php");
?>
