
<!-- Crear nueva oferta usuarios registrados-->

<div class="contenedor contenido_centrado crear_nuevo_formulario">
    <h3>Crear nueva oferta</h3>

    <?php include_once __DIR__ . "/../../templates/alertas.php" ?>

    <form class="contenedor_formulario" method="POST" action="/user/crearOfertas" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>
    </form>
</div>