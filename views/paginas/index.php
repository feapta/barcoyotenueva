
<!-- Pagina index -->

    <!-- Cartas -->
    <div class="contenedor contenedorCartas">
        <div class="cartas">
            <div class="conteTitulo">
                <h3>Ofertas temporada</h3>
            </div>

            <div class="conteImg">
                <a href="/ofertas">
                    <img loading="lazy" src="/build/img/ofertas.webp" alt="Ofertas">
                </a>
            </div>

            <div class="conteBoton">
                <a href="/ofertas" class="boton_amarillo-block">Ver</a>
            </div>
        </div>
        
        <div class="cartas">
            <div class="conteTitulo">
                <h3>Menus</h3>
            </div>

            <div class="conteImg">
                <a href="/menus" >
                    <img loading="lazy" src="/build/img/menus.webp" alt="Menus">
                </a>
            </div>

            <div class="conteBoton">
                <a href="/menus" class="boton_amarillo-block">Ver</a>
            </div>
        </div>
        
        <div class="cartas">
            <div class="conteTitulo">
                <h3>Carta</h3>
            </div>
            <div class="conteImg">
                <a href="/carta_general">
                    <img loading="lazy" src="/build/img/carta.webp" alt="Carta">
                </a>
            </div>
            <div class="conteBoton">
                <a href="/carta_general" class="boton_amarillo-block">Ver</a>
            </div>
        </div>
    </div>

    <!-- Imagen pollos por encargo -->
    <div class="encargo">
        <div class="fondo_encargo">
            <h2>Pedidos por encargo</h2>
            <p>Pollos asados al estilo tradicional, pidalos con 24 horas de antelación</p>
            <a class="boton_verde" href="/contacto">Llamenos</a>
        </div>
    </div>

    <!-- Reseñas -->
    <div class="contenedor contenedorComentarios">
        <h2>Comentarios</h2>
        <hr class="linea">
        <div class="calificaciones">
            <div class="tresComentarios">
                <ul>
                    <?php foreach($calificaciones as $califica) { ?>
                        <li>
                            <div class="izquierda">
                                <?php if($califica->imagen_user) { ?>
                                    <img src="/imagenes_usuarios/<?php echo $califica->imagen_user; ?>" alt="Imagen"></p>
                                <?php  } else { ?>
                                    <img src="/imagenes_comentarios/<?php echo $califica->imagen;?>" alt="Imagen">
                                <?php }?>
                                <h5><?php echo $califica->nombre;    ?></h5>
                                <p><?php echo $califica->creada;    ?></p>
                            </div>
                            <div class="centro">
                                <p class="clasificacion">   
                                    <span class="fa fa-star <?php echo $califica->estrellas >= 1 ? 'checked' : ''  ?>">  </span>
                                    <span class="fa fa-star <?php echo $califica->estrellas >= 2 ? 'checked' : ''  ?>">  </span>
                                    <span class="fa fa-star <?php echo $califica->estrellas >= 3 ? 'checked' : ''  ?>">  </span>
                                    <span class="fa fa-star <?php echo $califica->estrellas >= 4 ? 'checked' : ''  ?>">  </span>
                                    <span class="fa fa-star <?php echo $califica->estrellas >= 5 ? 'checked' : ''  ?>">  </span>
                                </p>
                                <p><?php echo $califica->texto; ?></p>
                            </div>
                        </li>
                        <hr class="linea2">
                    <?php  } ?>
                </ul>
            </div>

            <div class="unComentario">
                <?php foreach($califica_una as $califica_A) { ?>
                    <ul class="calificacion">
                        <li class="cabecera">
                            <img src="/imagenes_comentarios/<?php echo $califica_A->imagen;?>" alt="Imagen"></p>
                            <h4><?php echo $califica_A->nombre;    ?></h4>
                            <p><?php echo $califica_A->creada;    ?></p>
                            <p class="clasifi
                            cacion">   
                                <span class="fa fa-star <?php echo $califica_A->estrellas >= 1 ? 'checked' : ''  ?>">  </span>
                                <span class="fa fa-star <?php echo $califica_A->estrellas >= 2 ? 'checked' : ''  ?>">  </span>
                                <span class="fa fa-star <?php echo $califica_A->estrellas >= 3 ? 'checked' : ''  ?>">  </span>
                                <span class="fa fa-star <?php echo $califica_A->estrellas >= 4 ? 'checked' : ''  ?>">  </span>
                                <span class="fa fa-star <?php echo $califica_A->estrellas >= 5 ? 'checked' : ''  ?>">  </span>
                            </p>
                        </li>
                        <li class="cuerpo">
                            <p><?php echo $califica_A->texto; ?></p>
                        </li>
                    </ul>
                <?php  } ?>
            </div>
        </div>
        <div class="barraBotones">
            <button href="/blog" class="boton_amarillo" data-paso="2">Ver todas</button>
            <button href="/blog" class="boton_amarillo" data-paso="3">Comentar</button>
            <button href="/usuarios/registro" class="boton_amarillo">Registrarse</button>
            
            <!-- <a href="/blog" class="boton_amarillo" data-paso="2">Ver todas</a> 
            <a href="/blog" class="boton_amarillo" data-paso="3">Comentar</a>
            <a href="/usuarios/registro" class="boton_amarillo">Registrarse</a> -->
        </div>
    </div>

    
    <!-- Redes sociales -->
    <div class="contenedor social">
        <h2>Siguenos</h2>
        <div class="contenido_social">
            <div>
                <h4>facebook</h4>
                <a href="https://www.facebook.com/search/top?q=bar%20coyote%20musica"  target="_blank"><img src="/build/img/facebook.webp" alt=""></a>
            </div>
            <div>
                <h4>instagram</h4>
                <a href=""><img src="/build/img/instagram.webp" alt=""></a>
            </div>
            <div>
                <h4>twiter</h4>
                <a href=""><img src="/build/img/gorjeo.webp" alt=""></a>
            </div>
        </div>
    </div>

    <?php  
    $script .= '<script src="/build/js/botones_arriba.js"></script>';
?>