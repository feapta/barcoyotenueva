
<!-- Pagina crea nuevo menu -->

<div class="contenedor contenido_centrado crear_nuevo_menu">
    <h3>Crear bebida</h3>

    <?php include_once __DIR__ . "/../../templates/alertas.php" ?>

    <form class="contenedor_formulario" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>
    </form>
</div>