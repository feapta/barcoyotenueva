
<!-- Pagina index -->

    <!-- Cartas -->
    <main class="contenedor carta">
        <h1>Cartas</h1>
        <div class="contenedor_cartas">
            <div class="cartas">
                <div class="conte_titulo">
                    <h3>Ofertas temporada</h3>
                </div>

                <div class="conte_img">
                    <a href="/ofertas">
                        <img loading="lazy" src="/build/img/ofertas.webp" alt="Ofertas">
                    </a>
                </div>
                <div class="conte_a">
                    <a href="/ofertas" class="boton_amarillo-block">Ver</a>
                </div>
            </div>
           
            <div class="cartas">
                <div class="conte_titulo">
                    <h3>Carta de ofertas</h3>
                </div>
                <div class="conte_img">
                    <a href="/carta_ofertas" >
                        <img loading="lazy" src="/build/img/carta_ofertas.webp" alt="Carta ofertas">
                    </a>
                </div>
                <div class="conte_a">
                    <a href="/carta_ofertas" class="boton_amarillo-block">Ver</a>
                </div>
            </div>
           
            <div class="cartas">
                <div class="conte_titulo">
                    <h3>Carta general</h3>
                </div>
                <div class="conte_img">
                    <a href="/carta_general">
                        <img loading="lazy" src="/build/img/carta.webp" alt="Carta principal">
                    </a>
                </div>
                <div class="conte_a">
                    <a href="/carta_general" class="boton_amarillo-block">Ver</a>
                </div>
            </div>
        </div>
    </main>

    <!-- Imagen pollos por encargo -->
    <div class="encargo">
        <div class="fondo_encargo">
            <h2>Pedidos por encargo</h2>
            <p>Pollos asados al estilo tradicional, pidalos con 24 horas de antelación</p>
            <a class="boton_verde" href="/contacto">Llamenos</a>
        </div>
    </div>

    <!-- Reseñas -->
    <div class="contenedor califica grey-100">
        <h2>Blog</h2>
        <div class="calificaciones">
            <div class="pequeña">
                <?php foreach($calificaciones as $califica) { ?>
                    <ul class="calificacion">
                        <li class="cabecera">
                            <div class="izquierda">
                                <img src="/imagenes_usuarios/<?php echo $califica->imagen;?>" alt=""></p>
                            </div>
                            <div class="derecha">
                                <p><?php echo $califica->nombre;    ?></p>
                                <p><?php echo $califica->creada;    ?></p>
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
                    </ul>
                <?php  } ?>
            </div>

            <div class="grande">
                <?php foreach($califica_una as $califica_A) { ?>
                    <ul class="calificacion">
                        <li class="cabecera">
                            <img src="/imagenes_usuarios/<?php echo $califica_A->imagen;?>" alt="Imagen"></p>
                            <h4><?php echo $califica_A->nombre;    ?></h4>
                            <p><?php echo $califica_A->creada;    ?></p>
                            <p class="clasificacion">   
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

        <div class="contenedor_botones">
            <a href="/blog" class="boton_amarillo">  Ver todas  </a> 
            <a href="/dejar" class="boton_amarillo">  Dejar reseña  </a>
            <a href="/crear" class="boton_amarillo">  Registrarse  </a>
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
            <div>
                <h4>whatsapp</h4>
                <a href="/contacto"><img src="/build/img/whatsapp.webp" alt=""></a>
            </div>
        </div>
    </div>