<!-- Barras de búsqueda -->
<?php if (($_SESSION["rol"]) == "administrador") { ?>
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
        $id_apto = strtolower($a->getId());
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
                        <td>" . htmlspecialchars($a->getId()) . "</td>
                        <td>" . htmlspecialchars($a->getTorre()) . "</td>
                        <td>" . htmlspecialchars($a->getPropietarioId()) . "</td>
                        <td>" . htmlspecialchars($a->getCoeficiente()) . "</td>
                    </tr>";
                }
            }
            ?>
        </tbody>
    </table>
<?php } else {
    $apartamento = new Apartamento();
    $misApartamentos = $apartamento->obtenerPorPropietario($_SESSION["id"]);
    echo "<table class='table table-bordered table-striped mt-3'>
        <thead class='table-success'>
            <tr>
                <th>ID</th>
                <th>Torre</th>
                <th>Coeficiente</th>
            </tr>
        </thead>
        <tbody>";
    foreach ($misApartamentos as $m) {
        echo "<tr>
                    <td>" . $m->getId() . "</td>
                    <td>" . $m->getTorre() . "</td>
                    <td>" . $m->getCoeficiente() . "</td>
            </tr>";
    }
    echo "</tbody></table>";

} ?>