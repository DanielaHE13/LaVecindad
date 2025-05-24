<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: index.php");
    exit();
}

require_once('../logica/Propietario.php');

$id = $_SESSION["id"];
$propietario = new Propietario($id);
$propietario->consultar();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Panel Propietario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <!-- Navbar para móviles -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success d-lg-none">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Hola, <?php echo htmlspecialchars($propietario->getNombre()); ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuLateralMovil">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row vh-100">
            <!-- Menú lateral fijo para pantallas grandes -->
            <nav class="col-lg-3 col-xl-2 d-none d-lg-flex flex-column p-3 text-white" style="background-color: var(--bs-success);">
                <span class="fs-5 mb-4">Hola, <?php echo htmlspecialchars($propietario->getNombre()); ?></span>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="pagarCuentasCobro.php" class="nav-link text-white">Pagar Cuentas de Cobro</a>
                    </li>
                    <li>
                        <a href="consultarCuentasCobro.php" class="nav-link text-white">Consultar Cuentas de Cobro</a>
                    </li>
                    <li>
                        <a href="consultarMisApartamentos.php" class="nav-link text-white">Consultar Mis Apartamentos</a>
                    </li>
                    <li>
                        <a href="historialFacturas.php" class="nav-link text-white">Historial de Facturas</a>
                    </li>
                </ul>
                <hr class="text-white" />
                <a href="cerrarsesion.php" class="btn btn-outline-light w-100">Cerrar sesión</a>
            </nav>

            <!-- Menú colapsable para móviles -->
            <div class="collapse d-lg-none bg-success text-white col-12 p-3" id="menuLateralMovil">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="pagarCuentasCobro.php" class="nav-link text-white">Pagar Cuentas de Cobro</a>
                    </li>
                    <li>
                        <a href="consultarCuentasCobro.php" class="nav-link text-white">Consultar Cuentas de Cobro</a>
                    </li>
                    <li>
                        <a href="consultarMisApartamentos.php" class="nav-link text-white">Consultar Mis Apartamentos</a>
                    </li>
                    <li>
                        <a href="historialFacturas.php" class="nav-link text-white">Historial de Facturas</a>
                    </li>
                    <li class="mt-3">
                        <a href="cerrarsesion.php" class="btn btn-outline-light w-100">Cerrar sesión</a>
                    </li>
                </ul>
            </div>

            <!-- Contenido principal -->
            <main class="col-12 col-lg-9 col-xl-10 p-4 bg-light">
                <h2 class="text-success">Panel del Propietario</h2>
                <p>Gestiona tus pagos y consultas desde aquí.</p>
                <!-- Puedes incluir contenido dinámico aquí -->
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
