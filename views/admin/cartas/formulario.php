


<div class="head_formulario">
        <div class="campo">
            <label for="nombre">Familia</label>
                <select name="producto[categoria]" id="categoria">
                        
                        <!-- crear -->
                    <?php if(!$productos->id) { ?>
                        <option value="">-- Seleccione --</option>
                    <?php }else { ?>
                        <!-- Actualizar -->
                        <option value="<?php echo s($productos->categoria);?>"><?php echo $productos->categoria;?></option>
                    <?php }?>

                    <?php foreach($categorias as $cate) : ?>
                        <option 
                            <?php echo $productos->categoria === $cate->categoria ? 'selected' : ''; ?>
                            value="<?php echo s($cate->categoria) ?>"> <?php echo $cate->categoria?>
                        </option>
                    <?php endforeach?>
                </select>
           
        </div>

        <div class="campo">
            <label for="oferta">Oferta</label>
           
            <select name="producto[oferta]"  id="oferta">
                <?php if($productos->id) { ?>
                    <option value=<?php echo s($productos->oferta); ?> selected><?php if($productos->oferta === '1') { echo "Si";} else { echo "No";}?></option>
                <?php }else { ?>
                    <option value="">-- Seleccione --</option>
                <?php }?>
                
                <option value="0">No</option>
                <option value="1">Si</option>
            </select>
        </div>

        <div class="campo">
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="producto[titulo]" placeholder="Título" value=<?php echo s($productos->titulo); ?>>
        </div>

        <div class="campo">
            <label for="descripcion">Descripción</label>
            <textarea name="producto[descripcion]" id="descripcion"><?php echo s($productos->descripcion); ?></textarea>
        </div>

        <div class="campo">
            <label for="media">Media</label>
            <select name="producto[media]"  id="media">
            <?php if($productos->id) { ?>
                    <option value=<?php echo s($productos->media); ?> selected><?php if($productos->media === '1') { echo "Si";} else { echo "No";}?></option>
                <?php }else { ?>
                    <option value="">-- Seleccione --</option>
                <?php }?>
                
                <option value="0">No</option>
                <option value="1">Si</option>
            </select>
        </div>

        <div class="campo">
            <label for="precio">Precio</label>
            <input type="number" step="0.01" id="precio" name="producto[precio]" placeholder="0,00" value=<?php echo s($productos->precio); ?>>
        </div>

        <div class="campo">
            <label for="precio_ofer">Precio oferta</label>
            <input type="number" step="0.01" id="precio_ofer" class="precios" name="producto[precio_ofer]" placeholder="0,00" min="0" value=<?php echo s($productos->precio_ofer); ?>>
        </div>
    
        <div class="campo">
            <label for="precio_med">Precio media</label>
            <input type="number" step="0.01" id="precio_med" class="precios" name="producto[precio_med]" placeholder="0,00" min="0" value=<?php echo s($productos->precio_med); ?>>
        </div>

        <div class="campo">
            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" name="producto[imagen]" placeholder="Imagen" accept="image/jpeg, image/png">
        </div>

        <div class="contenedor_imagen">
            <?php  if($productos->imagen) { ?>
                <img src="/imagenes_cartas/<?php echo $productos->imagen ?>" class="imagen">
            <?php } ?>
        </div>

        <div class="botones">
            <input type="submit" value="Guardar" class="boton_verde">
            <a href="/admin/carta_general" class="boton_verde">Volver</a>
        </div>
</div>


<script src="/build/js/formu.js"></script>
