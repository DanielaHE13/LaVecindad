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