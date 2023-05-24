
<!-- Crear nueva oferta -->

<div class="contenedor contenido_centrado crear_nuevo_oferta">
    <h3>Crear nueva oferta</h3>

    <?php include_once __DIR__ . "/../../templates/alertas.php" ?>

    <form class="contenedor_formulario" method="POST" action="/admin/crear_oferta" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>
    </form>
</div>