

<!-- Registro de usuarios-->

<div class="contenedor contenido_centrado usuarios_registro">
    <p>Registrese para poder recibir alertas de nuevas ofertas y productos en su correo electronico o whatsapp.</p>

    <?php include_once __DIR__ . "/../templates/alertas.php" ?>
    
    <form  class="contenedor_formulario" method="POST" action="/usuarios/registro" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>
    </form>
    
    <div class="acciones">
        <a href="/login">Volver</a>
    </div>
</div>