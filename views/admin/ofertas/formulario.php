


        <div class="campo">
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="oferta[titulo]" placeholder="Título" value="<?php echo s($ofertas->titulo); ?>">
        </div>

        <div class="campo">
            <label for="descripcion">Descripción</label>
            <textarea name="oferta[descripcion]" id="descripcion" cols="100" rows="4"><?php echo s($ofertas->descripcion); ?></textarea>
        </div>

        <div class="campo">
            <label for="precio">Precio</label>
            <input type="number" step="0.01" id="precio" name="oferta[precio]" placeholder="0,00" value="<?php echo s($ofertas->precio); ?>">
        </div>
      
        <div class="campo">
            <label for="valida">Valida</label>
            <input type="date" id="valida" name="oferta[valida]" value="<?php echo s($ofertas->valida); ?>">
        </div>

        <div class="campo">
            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" name="oferta[imagen]" placeholder="Imagen" accept="image/jpeg, image/png">
        </div>
 
        <?php  if($ofertas->imagen) { ?>
            <img src="/imagenes_ofertas/<?php echo $ofertas->imagen ?>" class="imagen">
        <?php } ?>

        <div class="contenedor_botones">
            <input type="submit" class="boton_verde" value="Guardar">
        </div>