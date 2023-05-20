
<!-- Crear nueva oferta usuarios registrados-->

<div class="contenedor contenido_centrado crear_nuevo_formulario">
    <h3>Crear nueva oferta</h3>

    <?php include_once __DIR__ . "/../../templates/alertas.php" ?>

    <form class="formulario" method="POST" action="/user/crear_ofertas" enctype="multipart/form-data">
        <?php include __DIR__ . '/../../templates/formulario.php'; ?>

        <div class="botones">
            <input type="submit" value="Guardar" class="boton_verde">
            <a href="/admin/ofertas" class="boton_verde">Volver</a>
        </div>
    </form>
</div>