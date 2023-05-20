


<div class="contenedor comentarios">
    <div class="contenido_blog" >
        <?php foreach($calificaciones as $califica) { ?>
            <ul class="tabla_blog">
                <div class="columna_I">
                    <li>
                        <div> <img loading="lazy" src="/imagenes_usuarios/<?php echo $califica->imagen_user; ?>" alt="Imagen"> </div>
                    </li>
                    <li>
                        <div> <h5><?php echo $califica->nombre;    ?></h5>       </div>
                    </li>
                    <li>
                        <div> <p><?php echo $califica->creada;    ?></p>   </div>
                    </li>
                </div>

                <div class="columna_C">
                    <li class="comentarios">
                        <p class="clasificacion">   
                            <span class="fa fa-star <?php echo $califica->estrellas >= 5 ? 'checked' : ''  ?>">  </span>
                            <span class="fa fa-star <?php echo $califica->estrellas >= 4 ? 'checked' : ''  ?>">  </span>
                            <span class="fa fa-star <?php echo $califica->estrellas >= 3 ? 'checked' : ''  ?>">  </span>
                            <span class="fa fa-star <?php echo $califica->estrellas >= 2 ? 'checked' : ''  ?>">  </span>
                            <span class="fa fa-star <?php echo $califica->estrellas >= 1 ? 'checked' : ''  ?>">  </span>
                        </p>
                    </li>
                    <li>  <h5><?php echo $califica->titulo;    ?></h5>  </li>
                    <li>  <p><?php echo $califica->texto; ?>     </p>   </li>
                </div>
                <div class="columna_D">
                    <li>
                        <div> <img loading="lazy" src="/imagenes_comentarios/<?php echo $califica->imagen; ?>" alt="Imagen"> </div>
                    </li>
                </div>
            </ul>
        <?php  } ?>
    </div>
</div>



