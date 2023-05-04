
<!-- Pagina de recuperar password -->

<h1 class="nombre_pagina">Recuperar su password</h1>
<p class="descripcion_pagina">Coloque su nuevo pasaword a continuacion:</p>

<?php include_once __DIR__ . "/../templates/alertas.php" ?>

<?php if($error){ return; } ?>

<form class="formulario" method="POST">
    <div class="campo">
        <label for="password">Password</label>
        <input type="password" id="password" placeholder="Su nuevo password" name="password">
    </div>    

    <input type="submit" class="boton" value="Guardar nuevo password">
</form>

<div class="acciones">
    <a href="/">¿Ya tiene una cuenta? Inicie sesión</a>
    <a href="/crear_cuenta">¿Aún no tiene una cuenta? Cree una</a>
</div>