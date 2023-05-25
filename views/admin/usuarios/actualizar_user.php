
<!-- Actualizar datos del usuario  -->

<div class="contenedor contenido_centrado formulario_actualizarUser">
    <h3>Actualizar datos de usuarios</h3>

    <?php include_once __DIR__ . "/../../templates/alertas.php" ?>
    
    <form class="contenedor_formulario" method="POST"  action="/user/actualizar_P" enctype="multipart/form-data">

        <?php include __DIR__ . '/formulario.php'; ?>

    </form>
</div>