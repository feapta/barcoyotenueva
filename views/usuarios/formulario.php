
<!-- Pagina del formulario de registro -->


    <div class="registro">
        <div class="campo">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="usuarios[nombre]" placeholder="Nombre" value=<?php echo s($usuarios->nombre); ?>>
        </div>

        <div class="campo">
            <label for="apellidos">Apellidos</label>
            <input type="text" id="apellidos" name="usuarios[apellidos]" placeholder="Apellidos" value=<?php echo s($usuarios->apellidos); ?>>
        </div>

        <div class="campo">
            <label for="email">Email</label>
            <input type="email" id="email" name="usuarios[email]" placeholder="Email" value=<?php echo s($usuarios->email); ?>>
        </div>

        <div class="campo">
            <label for="password">Password</label>
            <input type="password" id="password" name="usuarios[password]" placeholder="Password">
        </div>

        <div class="campo">
            <label for="telefono">Teléfono</label>
            <input type="number" id="telefono" name="usuarios[telefono]" placeholder="Teléfono" value=<?php echo s($usuarios->telefono); ?>>
        </div>

        <div class="campo">
            <label for="imagen">Imagen</label>
           <input type="file" id="imagen" name="usuarios[imagen]" placeholder="Imagen propiedad" accept="image/jpeg, image/png">
        </div>

        

        <input type="submit" value="Registro" class="boton_verde">
    </div>

