
<!-- Actualizar oferta  -->

<div class="contenedor contenido_centrado formulario_actualizar">
    <h3>Actualizar oferta usuarios registrados</h3>

    <?php include_once __DIR__ . "/../../templates/alertas.php" ?>
    
    <form class="formulario" method="POST"  action="/user/actualizar_oferta" enctype="multipart/form-data">
        <?php include __DIR__ . '/../../templates/formulario.php'; ?>
    </form>
</div>