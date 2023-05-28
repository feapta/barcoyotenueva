
    <div class="campo">
        <label for="nombre">Título</label>
        <input type="text" id="nombre" name="menu[nombre]" placeholder="Nombre" value=<?php echo s($menuss->nombre); ?>>
    </div>

    <div class="campo">
        <label for="descripcion">Descripción</label>
        <textarea name="menu[descripcion]" id="descripcion"><?php echo s($menus->descripcion); ?></textarea>
    </div>

    <div class="campo">
        <label for="precio">Precio</label>
        <input type="number" step="0.01" id="precio" name="menu[precio]" placeholder="0,00" value=<?php echo s($menus->precio); ?>>
    </div>

    <div class="campo">
        <label for="imagen">Imagen</label>
        <input type="file" id="imagen" name="menu[imagen]" placeholder="Imagen" accept="image/jpeg, image/png">
    </div>

    <div class="contenedor_imagen">
        <?php  if($menus->imagen) { ?>
            <img src="/imagenes_menus/<?php echo $menus->imagen ?>" class="imagen">
        <?php } ?>
    </div>

    <div class="contenedor_botones">
        <input type="submit" class="boton_verde" value="Guardar">
    </div>

