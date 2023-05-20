
<!-- Crear nueva oferta -->

<div class="contenedor contenido_centrado crear_nuevo_formulario">
    <h3>Crear nueva oferta</h3>

    <?php include_once __DIR__ . "/../../templates/alertas.php" ?>

    <form class="formulario" method="POST" action="/admin/crear_oferta" enctype="multipart/form-data">
        <?php include __DIR__ . '/../../templates/formulario.php'; ?>
    </form>
</div>