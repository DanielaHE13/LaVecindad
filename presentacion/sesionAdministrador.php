<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: index.php");
    exit();
}

require_once('../logica/Administrador.php');
require_once('../logica/Apartamento.php');

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
                    <li class="nav-item"><a href="crearCuentasCobro.php" class="nav-link text-white">Crear Cuentas de Cobro</a></li>
                    <li><a href="consultarCuentasCobro.php" class="nav-link text-white">Consultar Cuentas de Cobro</a></li>
                    <li><a href="consultarPropietarios.php" class="nav-link text-white">Consultar Propietarios</a></li>
                    <li><a href="SesionAdministrador.php?apartamentos=1" class="nav-link text-white">Consultar Apartamentos</a></li>
                </ul>

                <hr class="text-white" />
                <a href="cerrarsesion.php" class="btn btn-outline-light w-100">Cerrar sesión</a>
            </nav>

            <!-- Menú para móviles -->
            <div class="collapse d-lg-none bg-success text-white col-12 p-3" id="menuLateralMovil">
                <ul class="nav flex-column">
                    <li><a href="crearCuentasCobro.php" class="nav-link text-white">Crear Cuentas de Cobro</a></li>
                    <li><a href="consultarCuentasCobro.php" class="nav-link text-white">Consultar Cuentas de Cobro</a></li>
                    <li><a href="consultarPropietarios.php" class="nav-link text-white">Consultar Propietarios</a></li>
                    <li><a href="SesionAdministrador.php?apartamentos=1" class="nav-link text-white">Consultar Apartamentos</a></li>
                    <li class="mt-3"><a href="cerrarsesion.php" class="btn btn-outline-light w-100">Cerrar sesión</a></li>
                </ul>
            </div>

            <!-- Consultar Apartamentos -->
            <main class="col-12 col-lg-9 col-xl-10 p-4 bg-light">
                <h2 class="text-success">Panel de Administrador</h2>

                <?php if (isset($_GET['apartamentos'])): ?>
                    <h4 class="mt-4">Listado de Apartamentos</h4>

                    <!-- Barras de búsqueda -->
                    <form method="GET" class="row g-3 mb-3">
                        <input type="hidden" name="apartamentos" value="1">
                        <div class="col-md-3">
                            <input type="text" name="id_apartamento" class="form-control" placeholder="ID Apartamento"
                                value="<?php echo isset($_GET['id_apartamento']) ? htmlspecialchars($_GET['id_apartamento']) : ''; ?>">
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="torre" class="form-control" placeholder="Torre"
                                value="<?php echo isset($_GET['torre']) ? htmlspecialchars($_GET['torre']) : ''; ?>">
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="id_propietario" class="form-control" placeholder="ID Propietario"
                                value="<?php echo isset($_GET['id_propietario']) ? htmlspecialchars($_GET['id_propietario']) : ''; ?>">
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-success w-100">Buscar</button>
                        </div>
                    </form>

                    <?php
                    $apartamento = new Apartamento();
                    $todos = $apartamento->consultarTodos();

                    $id_apartamento_filtro = isset($_GET['id_apartamento']) ? strtolower(trim($_GET['id_apartamento'])) : '';
                    $torre_filtro = isset($_GET['torre']) ? strtolower(trim($_GET['torre'])) : '';
                    $id_propietario_filtro = isset($_GET['id_propietario']) ? strtolower(trim($_GET['id_propietario'])) : '';

                    $filtrados = array_filter($todos, function ($a) use ($id_apartamento_filtro, $torre_filtro, $id_propietario_filtro) {
                        $id_apto = strtolower($a->getIdApartamento());
                        $torre = strtolower($a->getTorre());
                        $id_prop = strtolower($a->getPropietarioId());

                        return (empty($id_apartamento_filtro) || str_contains($id_apto, $id_apartamento_filtro)) &&
                            (empty($torre_filtro) || str_contains($torre, $torre_filtro)) &&
                            (empty($id_propietario_filtro) || str_contains($id_prop, $id_propietario_filtro));
                    });

                    $filtrados = array_values($filtrados); 

                    $total = count($filtrados);
                    $porPagina = 10;
                    $paginaActual = isset($_GET['pagina']) ? max(1, intval($_GET['pagina'])) : 1;
                    $totalPaginas = ceil($total / $porPagina);
                    $inicio = ($paginaActual - 1) * $porPagina;
                    $pagActual = array_slice($filtrados, $inicio, $porPagina);
                    ?>

                    <table class="table table-bordered table-striped mt-3">
                        <thead class="table-success">
                            <tr>
                                <th>ID</th>
                                <th>Torre</th>
                                <th>ID Propietario</th>
                                <th>Coeficiente</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (empty($pagActual)) {
                                echo '<tr><td colspan="4" class="text-center">No se encontraron resultados.</td></tr>';
                            } else {
                                foreach ($pagActual as $a) {
                                    echo "<tr>
                                        <td>" . htmlspecialchars($a->getIdApartamento()) . "</td>
                                        <td>" . htmlspecialchars($a->getTorre()) . "</td>
                                        <td>" . htmlspecialchars($a->getPropietarioId()) . "</td>
                                        <td>" . htmlspecialchars($a->getCoeficiente()) . "</td>
                                    </tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>

                    <!-- Paginación -->
                    <?php if ($totalPaginas > 1): ?>
                        <nav>
                            <ul class="pagination">
                                <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                                    <?php if ($i === $paginaActual): ?>
                                        <li class="page-item active">
                                            <a class="page-link bg-success text-white fw-bold border-success"
                                                href="?apartamentos=1&id_apartamento=<?php echo urlencode($id_apartamento_filtro); ?>&torre=<?php echo urlencode($torre_filtro); ?>&id_propietario=<?php echo urlencode($id_propietario_filtro); ?>&pagina=<?php echo $i; ?>">
                                                <?php echo $i; ?>
                                            </a>
                                        </li>
                                    <?php else: ?>
                                        <li class="page-item">
                                            <a class="page-link bg-white text-success border-success"
                                                href="?apartamentos=1&id_apartamento=<?php echo urlencode($id_apartamento_filtro); ?>&torre=<?php echo urlencode($torre_filtro); ?>&id_propietario=<?php echo urlencode($id_propietario_filtro); ?>&pagina=<?php echo $i; ?>">
                                                <?php echo $i; ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </ul>
                        </nav>

                    <?php endif; ?>

                <?php else: ?>
                    <p class="mt-4">Selecciona una opción del menú para comenzar.</p>
                <?php endif; ?>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>