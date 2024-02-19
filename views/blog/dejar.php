
<!-- Formulario de comentarios -->

<div class="contenedor dejar">
    <h3>Comentarios</h3>
    <p>Rellene los datos del formulario y dejenos sus comentarios, puede registrarse, si lo deseea, y le enviaremos ofertas periodicamente a su correo.</p>
    <p>Gracias por sus comentarios</p>

    <?php if($mensaje) { ?>
            <p class="alerta exito"> <?php echo $mensaje; ?> </p>
    <?php  }?>


    <div class="contenedor_formulario">
        <form class="formulario_dejar" method="POST" action="/dejar" enctype="multipart/form-data">
            <fieldset class="datos">
                <legend>Datos personales</legend>

                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="califica[nombre]" placeholder="Su nombre" value="<?php echo ($califica->nombre); ?>" require>

                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" name="califica[imagen]" placeholder="Imagen" accept="image/jpeg, image/png">

            </fieldset>

            <fieldset class="comentarios">
                <legend>Comentarios</legend>
                
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

                <label for="titulo">Titulo</label>
                <input type="text" id="titulo" name="califica[titulo]" placeholder="Pongale un titulo" value="<?php echo s($califica->titulo); ?>">

                <label for="texto">Comentarios</label>
                <textarea type="text" id="texto" name="califica[texto]" placeholder="Comentarios" value="<?php echo s($califica->texto); ?>"></textarea>
            </fieldset>

            <input type="submit" value="Enviar" class="boton_verde">
        </form>
    </div>

    <div class="contenedor_botones_pagina">
        <a href="/blog" class="boton_amarillo">  Volver  </a> 
        <a href="/crear" class="boton_amarillo">  Registrarse  </a>
    </div>

</div>