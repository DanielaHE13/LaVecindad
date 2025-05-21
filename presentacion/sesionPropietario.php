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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="d-flex vh-100">
        <!-- Menú Vertical -->
        <nav class="d-flex flex-column flex-shrink-0 p-3 bg-primary text-white" style="width: 250px;">
            <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-4">Hola, <?php echo htmlspecialchars($propietario->getNombre()); ?></span>
            </a>
            <hr class="text-white" />
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="pagarCuentasCobro.php" class="nav-link text-white">
                        Pagar Cuentas de Cobro
                    </a>
                </li>
                <li>
                    <a href="consultarCuentasCobro.php" class="nav-link text-white">
                        Consultar Cuentas de Cobro
                    </a>
                </li>
                <li>
                    <a href="consultarMisApartamentos.php" class="nav-link text-white">
                        Consultar Mis Apartamentos
                    </a>
                </li>
                <li>
                    <a href="historialFacturas.php" class="nav-link text-white">
                        Historial de Facturas
                    </a>
                </li>
            </ul>
            <hr class="text-white" />
            <div>
                <a href="logout.php" class="btn btn-outline-light w-100">Cerrar sesión</a>
            </div>
        </nav>

        <!-- Contenido Principal -->
        <main class="flex-grow-1 p-4 bg-light">
            <h2 class="text-primary">Panel del Propietario</h2>
            <p>Gestiona tus pagos y consultas desde aquí.</p>
            <!-- Aquí puedes agregar contenido dinámico o cargar formularios según la opción -->
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
