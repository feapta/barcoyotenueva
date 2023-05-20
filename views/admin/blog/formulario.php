

<!-- Formulario de articulos -->
    
        <div class="campo">
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="articulo[titulo]" placeholder="Título" value="<?php echo s($articulo->titulo); ?>">
        </div>

        <div class="campo">
            <label for="parrafo">Texto</label>
            <textarea id="parrafo" name="articulo[parrafo]" rows="10" placeholder="Texto del articulo"> <?php echo s($articulo->parrafo); ?> </textarea>
        </div>

        <div class="campo">
            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" name="articulo[imagen]" placeholder="Imagen" accept="image/jpeg, image/png">
        </div>

        <div class="contenedor_imagen">
            <?php  if($articulo->imagen) { ?>
                <img src="/imagenes_articulos/<?php echo $articulo->imagen ?>" class="imagen">
            <?php } ?>
        </div>

        <input type="submit"  class="boton_verde" value="Guardar">

