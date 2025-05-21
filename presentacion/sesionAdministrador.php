<?php
session_start();


if (!isset($_SESSION["id"])) {
    header("Location: index.php");
    exit();
}

require_once('../logica/Administrador.php');


$id = $_SESSION["id"];
$admin = new Administrador($id);
$admin->consultar();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Panel Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="d-flex vh-100">
        <!-- Menú Vertical -->
        <nav class="d-flex flex-column flex-shrink-0 p-3 bg-primary text-white" style="width: 250px;">
            <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-4">Hola, <?php echo htmlspecialchars($admin->getNombre()); ?></span>
            </a>
            <hr class="text-white" />
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="crearCuentasCobro.php" class="nav-link text-white">
                        Crear Cuentas de Cobro
                    </a>
                </li>
                <li>
                    <a href="consultarCuentasCobro.php" class="nav-link text-white">
                        Consultar Cuentas de Cobro
                    </a>
                </li>
                <li>
                    <a href="consultarPropietarios.php" class="nav-link text-white">
                        Consultar Propietarios
                    </a>
                </li>
                <li>
                    <a href="consultarApartamentos.php" class="nav-link text-white">
                        Consultar Apartamentos
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
            <h2 class="text-primary">Panel de Administración</h2>
            <p>Gestiona todas las opciones disponibles para el administrador desde aquí.</p>
            <!-- Aquí puedes incluir contenido dinámico o cargas AJAX según opción -->
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
