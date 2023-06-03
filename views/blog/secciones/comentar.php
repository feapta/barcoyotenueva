
<!-- Formulario de comentarios -->

<div class="contenedor comentar">
    <p>Rellene el formulario y dejenos sus comentarios.</p>

    <form class="contenedor_formulario" method="POST" action="/dejar" enctype="multipart/form-data">
        <input type="hidden" name="califica[id_usuario]" value="1">

            <div class="campo">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombreCalifica" name="califica[nombre]" placeholder="Su nombre">
            </div>

            <div class="campo">
                <label for="imagen">Imagen</label>
                <input type="file" id="imagenCalifica" name="califica[imagen]" placeholder="Imagen" accept="image/jpeg, image/png">
            </div>

            <div class="campo comentarios">
                <label>Calificanos</label>
                <p class="clasificacion">
                    <input id="radio5" type="radio" name="califica[estrellas]" value="5"><!--
                    --><label for="radio5">★</label><!--
                    --><input id="radio4" type="radio" name="califica[estrellas]" value="4"><!--
                    --><label for="radio4">★</label><!--
                    --><input id="radio3" type="radio" name="califica[estrellas]" value="3"><!--
                    --><label for="radio3">★</label><!--
                    --><input id="radio2" type="radio" name="califica[estrellas]" value="2"><!--
                    --><label for="radio2">★</label><!--
                    --><input id="radio1" type="radio" name="califica[estrellas]" value="1"><!--
                    --><label for="radio1">★</label>
                </p>
            </div>

            <div class="campo">
                <label for="titulo">Titulo</label>
                <input type="text" id="titulo" name="califica[titulo]" placeholder="Pongale un titulo">
            </div>

            <div class="campo">
                <label for="texto">Comentarios</label>
                <textarea type="text" id="texto" name="califica[texto]" placeholder="Comentarios" value="<?php echo s($califica->texto); ?>"></textarea>
            </div>
            
            <div class="contenedor_botones">
                <input type="submit" value="Enviar" class="boton_light-green-400">
            </div>
    </form>



</div>