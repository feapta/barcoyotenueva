
<!-- Blog listado de comentarios --> 

<div class="contenedor contenedor_blog">
    <h3>Reseñas</h3>

    <div class="botones">
        <a href="/" class="boton_amarillo">  Volver  </a> 
        <a href="/dejar" class="boton_amarillo">  Dejar reseña  </a>
        <a href="/usuarios/crear" class="boton_amarillo">Registrarse  </a>
    </div>

    <div class="comentarios">
        <?php foreach($calificaciones as $califica) { ?>
            <ul class="comentario">
                <div class="columnas_I">
                    <li>
                        <div> <img loading="lazy" src="/imagenes_usuarios/<?php echo $califica->imagen; ?>" alt="Imagen"> </div>
                    </li>
                    <li>
                        <div> <h5><?php echo $califica->nombre;    ?></h5>       </div>
                    </li>
                    <li>
                        <div> <p><?php echo $califica->creada;    ?></p>   </div>
                    </li>
                </div>

                <div class="columnas_D">
                    <li>
                        <p class="clasificacion_pagina">   
                            <span class="fa fa-star <?php echo $califica->estrellas >= 1 ? 'checked' : ''  ?>">  </span>
                            <span class="fa fa-star <?php echo $califica->estrellas >= 2 ? 'checked' : ''  ?>">  </span>
                            <span class="fa fa-star <?php echo $califica->estrellas >= 3 ? 'checked' : ''  ?>">  </span>
                            <span class="fa fa-star <?php echo $califica->estrellas >= 4 ? 'checked' : ''  ?>">  </span>
                            <span class="fa fa-star <?php echo $califica->estrellas >= 5 ? 'checked' : ''  ?>">  </span>
                        </p>
                    </li>
                    <li>  <h5><?php echo $califica->titulo;    ?></h5>  </li>
                    <li>  <p><?php echo $califica->texto; ?>     </p>   </li>
                </div>
            </ul>
        <?php  } ?>
    </div>


</div>
