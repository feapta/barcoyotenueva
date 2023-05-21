
<!-- Pagina crea nuevo producto -->

<div class="contenedor contenido_centrado crear_nuevo_formulario">
    <h3>Crear nuevo producto</h3>

    <?php include_once __DIR__ . "/../../templates/alertas.php" ?>

    <form class="contenedor_formulario" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>
    </form>
</div>