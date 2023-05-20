
<!-- Pagina de login -->

<div class="contenedor contenido_centrado usuarios_login">
    <h1>Acceso a usuarios</h1>

    <?php include_once __DIR__ . "/../templates/alertas.php";  ?>

    <form class="contenedor_formulario" method="POST" action="/login" novalidate>
            <div class="campo">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Tu Email" name="email">
            </div>

            <div class="campo">
                <label for="password">Password</label>
                <div class="mostrar_password">
                    <input type="password" id="password" name="password" placeholder="Password">
                    <img id="ima-1" class="ocultar"src="/build/img/mostrar.webp" alt="">
                    <img id="ima-2" src="/build/img/esconder.webp" alt="">
                </div>
            </div>

        <input type="submit" class="boton_verde" value="Iniciar Sesión">
    </form>

    <div class="acciones">
        <a href="/usuarios/registro">¿Quiere registrarse?</a>
        <a href="/usuarios/olvidado">Olvido su contraseña?</a>
    </div>

</div>

<?php  $script = '<script src="/build/js/mostrar_pass.js"></script>'; ?>