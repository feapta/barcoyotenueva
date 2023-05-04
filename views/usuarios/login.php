
<!-- Pagina de login -->

<div class="contenedor contenido_centrado usuarios_login">
    <h1>Acceso a usuarios</h1>

    <?php include_once __DIR__ . "/../templates/alertas.php";  ?>

    <form class="formulario" method="POST" action="/login" novalidate>
            <div class="campo_login">
                <label for="email">Email</label>
                <input
                    type="email"
                    id="email"
                    placeholder="Tu Email"
                    name="email"
                >
            </div>

            <div class="campo_login">
                <label for="password">Password</label>
                <input 
                    type="password"
                    id="password"
                    placeholder="Tu Password"
                    name="password"
                >
            </div>

        <input type="submit" class="boton_verde" value="Iniciar Sesión">
    </form>

    <div class="acciones">
        <a href="/usuarios/registro">¿Quiere registrarse?</a>
        <a href="/usuarios/olvidado">Olvido su contraseña?</a>
    </div>

</div>