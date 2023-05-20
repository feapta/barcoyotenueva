

<!-- Comentarios -->

<div class="contenedor_formulario user_comentarios">
    <form class="contenedor_formulario" method="POST" action="/user/dejar" enctype="multipart/form-data">
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" value="<?php echo s($usuarios->nombre); ?>" disabled >
            </div>
            
            <div class="campo">
                <label for="titulo">Imagen</label>
                <input type="file" id="imagen" name="califica[imagen]" placeholder="Imagen" accept="image/jpeg, image/png">
            </div>
        
            <div class="campo comentarios campoUserComen">
                <label for="titulo">Calificacíon</label>
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
                <input type="text" id="titulo" name="califica[titulo]" placeholder="Pongale un titulo" value="<?php echo s($califica->titulo); ?>">
            </div>

            <div class="campo">
                <label for="texto">Comentario</label>
                <textarea type="text" id="texto" name="califica[texto]" placeholder="Comentarios" value="<?php echo s($califica->texto); ?>"></textarea>
            </div>
         
            <input type="submit" value="Enviar" class="boton_verde">
    </form>
</div>