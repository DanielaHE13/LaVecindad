<?php
session_start();
require_once("../logica/Administrador.php");
require_once("../logica/Propietario.php");

// Procesar formulario
if (isset($_POST["autenticar"])) {
    $correo = $_POST["correo"];
    $clave = $_POST["clave"];

    $admin = new Administrador("", "", "", $correo, $clave);
    if ($admin->autenticar()) {
        $_SESSION["id"] = $admin->getId();
        $_SESSION["rol"] = "administrador";
        header("Location: ../presentacion/sesionAdministrador.php");
        exit;
    }

    $propietario = new Propietario("", "", "", $correo, $clave);
    if ($propietario->autenticar()) {
        $_SESSION["id"] = $propietario->getId();
        $_SESSION["rol"] = "propietario";
        header("Location: ../presentacion/sesionPropietario.php");
        exit;
    }

    // Si no autenticó
    echo "<script>alert('Correo o clave incorrectos'); window.location.href='../index.php';</script>";
}

?>
