
<!-- Pagina del formulario de registro -->

    <div class="campo">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="usuarios[nombre]" placeholder="Nombre" value="<?php echo s($usuarios->nombre); ?>">
    </div>

    <div class="campo">
        <label for="apellidos">Apellidos</label>
        <input type="text" id="apellidos" name="usuarios[apellidos]" placeholder="Apellidos" value="<?php echo s($usuarios->apellidos); ?>">
    </div>

    <div class="campo">
        <label for="email">Email</label>
        <input type="email" id="email" name="usuarios[email]" placeholder="Email" value=<?php echo s($usuarios->email); ?>>
    </div>
    
    <?php if(!$usuarios->id) { ?>
        <div class="campo">
            <label for="password">Password</label>
            <div class="mostrar_password">
                <input type="password" id="password" name="usuarios[password]" placeholder="Password">
                <img id="muestra" src="/build/img/mostrar.webp" alt="">
                <img id="oculta" src="/build/img/esconder.webp" alt="">
            </div>
        </div>
    <?php }?>

    <div class="campo">
        <label for="telefono">Teléfono</label>
        <input type="number" id="telefono" name="usuarios[telefono]" placeholder="Teléfono" value=<?php echo s($usuarios->telefono); ?>>
    </div>

    <div class="campo">
        <label for="imagen">Imagen</label>
        <input type="file" id="imagen" name="usuarios[imagen]" placeholder="Imagen" accept="image/jpeg, image/png">
    </div>
    
    <div class="campo campo_label">
        <label for="recibir">Desea recibir información </label>
        <input type="checkbox" id="recibir" name="usuarios[recibir]" value="1">
    </div>

    <div class="contenedor_imagen">
        <?php if($usuarios->id) { ?>
            <img class="imagen_usuario" src="/imagenes_usuarios/<?php echo $usuarios->imagen ?>" alt="Imagen">
        <?php } ?>
    </div>

    <?php if($usuarios->id) { ?>
        <div class="botones_usuarios">
            <input type="submit" value="Guardar" class="boton_verde mostrar_boton">
            <input type="button" class="boton_verde cambioPassword" value="Cambiar password">
            <input type="button" class="boton_verde eliminarCuenta" value="Eliminar su cuenta">
        </div>
    <?php } else { ?>
        <input type="submit" value="Registro" class="boton_verde">
    <?php }?>

