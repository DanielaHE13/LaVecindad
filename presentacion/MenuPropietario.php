<?php

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
                    <?php include("opciones.php");?>
                </ul>
                <hr class="text-white" />
                <a href="cerrarsesion.php" class="btn btn-outline-light w-100">Cerrar sesión</a>
            </nav>

            <!-- Menú colapsable para móviles -->
            <div class="collapse d-lg-none bg-success text-white col-12 p-3" id="menuLateralMovil">
                <ul class="nav flex-column">
                    <?php include("opciones.php");?>
                    <li class="mt-3">
                        <a href="cerrarsesion.php" class="btn btn-outline-light w-100">Cerrar sesión</a>
                    </li>
                </ul>
            </div>

            <!-- Contenido principal -->
            <div class="col-12 col-lg-9 col-xl-10 p-4 bg-light">
                <h2 class="text-success">Panel del Propietario</h2>
                <?php 
                if (isset($_GET['propietario'])) {
                    
                    switch (($_GET['propietario'])) {
                        case 1:
                            include("cuentaCobro/pagarCC.php");
                            break;
                        case 2:
                            include("cuentaCobro/consultarCC.php");
                            break;
                        case 3:
                            include("apartamento.php");
                            break;
                        case 4:
                            include("pago/historialFactura.php");
                            break;
                        default:
                            echo "Ninguna coincidencia";
                            break;
                    }
                }else{
                    echo "<p class='mt-4'>Selecciona una opción del menú para comenzar.</p>";
                }
            
                ?>
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
