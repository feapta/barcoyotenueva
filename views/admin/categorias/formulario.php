
<!-- Pagina del formulario de registro -->


    <div class="campo">
        <label for="categorias">Familia</label>
        <input type="text" id="categorias" name="categorias[categoria]" placeholder="Familia" value="<?php echo s($categorias->categoria); ?>">
    </div>

    <div class="campo">
        <label for="imagen">Imagen</label>
        <input type="file" id="imagen" name="categorias[imagen]" accept="image/jpeg, image/png">
    </div>

    <?php  if($categorias->imagen) { ?>
        <img src="/imagenes_categorias/<?php echo $categorias->imagen ?>" class="imagen">
    <?php } ?>

    <div class="contenedor_botones">
        <input type="submit" class="boton_verde" value="Guardar">
    </div>
    

