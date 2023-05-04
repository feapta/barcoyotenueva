
<!-- Pagina de olvido su password -->

<div class="contenedor seccion contenido_centrado olvidado">
    <h1>Olvidó su password</h1>
    <p> Reestablezca su password escribiendo su email</p>

    <?php include_once __DIR__ . "/../templates/alertas.php" ?>

    <form class="formulario" method="POST" action="/olvidado">
        <div class="campo_olvidado">
            <label for="email">Email</label>
            <input 
                type="email" 
                id="email" 
                placeholder="Su email" 
                name="email"
                >
        </div>    

        <input type="submit" class="boton_verde" value="Restablecer">
    </form>

    <div class="acciones">
        <a href="/login">¿Ya tiene una cuenta? -> Inicie sesión</a>
        <a href="/crear">¿Aún no tiene una cuenta? -> Cree una</a>
    </div>
</div>