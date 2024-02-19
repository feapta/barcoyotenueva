
<!-- Ofertas de temporada -->

<div class="contenedor seccion califica_pagina">
    <h3>Reseñas</h3>

    <div class="contenedor_botones_pagina">
        <a href="/" class="boton_amarillo">  Volver  </a> 
        <a href="/dejar" class="boton_amarillo">  Dejar reseña  </a>
        <a href="/usuarios/crear" class="boton_amarillo">Registrarse  </a>
    </div>

    <div class="calificaciones_pagina">
        <div class="pequeña_pagina">
            <?php foreach($calificaciones as $califica) { ?>
                <div class="contenido_blog">
                    <ul class="calificacion_pagina">
                        <div class="columnas_I">
                            <div>
                                <li>
                                    <img class="img_" loading="lazy" src="/imagenes_usuarios/<?php echo $califica->imagen; ?>" alt="Imagen"> </div>
                                </li>
                                <li>
                                    <div><h4><?php echo $califica->nombre;    ?></h4>       </div>
                                </li>
                                <li>
                                    <div><h5><?php echo $califica->creada;    ?></p></h5>   </div>
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
                            <li>  <h4><?php echo $califica->titulo;    ?></h4>  </li>
                            <li>  <p><?php echo $califica->texto; ?></p>        </li>
                        </div>
                    </ul>
                </div>
            <?php  } ?>
        </div>
    </div>


</div>

