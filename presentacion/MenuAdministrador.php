<?php


$id = $_SESSION["id"];
$admin = new Administrador($id);
$admin->consultar();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Panel Administrador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>

    <!-- Navbar para móviles -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success d-lg-none">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Hola, <?php echo htmlspecialchars($admin->getNombre()); ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuLateralMovil">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row vh-100">
            <!-- Menú lateral -->
            <nav class="col-lg-3 col-xl-2 d-none d-lg-flex flex-column p-3 text-white bg-success">
                <span class="fs-5 mb-4">Hola, <?php echo htmlspecialchars($admin->getNombre()); ?></span>
                <ul class="nav nav-pills flex-column mb-auto">
                    <?php include("opciones.php");?>
                </ul>

                <hr class="text-white" />
                <a href="cerrarsesion.php" class="btn btn-outline-light w-100">Cerrar sesión</a>
            </nav>

            <!-- Menú para móviles -->
            <div class="collapse d-lg-none bg-success text-white col-12 p-3" id="menuLateralMovil">
                <ul class="nav flex-column">
                   <?php include("opciones.php");?>
                    <li class="mt-3"><a href="cerrarsesion.php" class="btn btn-outline-light w-100">Cerrar sesión</a></li>
                </ul>
            </div>

            <!-- Consultar Apartamentos -->
            <main class="col-12 col-lg-9 col-xl-10 p-4 bg-light">
                <h2 class="text-success">Panel de Administrador</h2>

                <?php if (isset($_GET['administrador'])){ ?>


                <?php

                switch (($_GET['administrador'])) {
                    case 1:
                        echo "crear cuentas de cobro";
                        break;
                    case 2:
                        echo "consultar CC";

                        break;
                    case 3:
                        echo "consultar propietarios";
                        break;
                    case 4:
                        echo "<h4 class='mt-4'>Listado de Apartamentos</h4>";

                        include("ConsultarApartamentos.php");
                        include("Paginacion.php");
                        break;
                    default:
                        echo "Ninguna coincidencia";
                        break;
                }
            } else {
                echo "<p class='mt-4'>Selecciona una opción del menú para comenzar.</p>";
            }
            ?>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>