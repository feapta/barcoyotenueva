
<!-- Pagina de recuperar password -->

<div class="contenedor contenido_centrado">
    <h1>Recuperar su password</h1>
    <p>Coloque su nuevo pasaword a continuacion:</p>

    <?php include_once __DIR__ . "/../templates/alertas.php" ?>

    <?php if($error){ return; } ?>

    <form class="contenedor_formulario" method="POST">
        <div class="campo">
            <label for="password">Password</label>
            <input type="password" id="password" placeholder="Su nuevo password" name="password">
        </div>    

        <div class="contenedor_botones">
            <input type="submit" class="boton_verde" value="Guardar nuevo password">
        </div>
    </form>

    <div class="acciones">
        <a href="/">¿Ya tiene una cuenta? Inicie sesión</a>
        <a href="/crear_cuenta">¿Aún no tiene una cuenta? Cree una</a>
    </div>
</div>
