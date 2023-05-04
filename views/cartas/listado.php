

 <!-- Listado cartas -->


<div class="contenedor listado_cartas">
    <div class="titulo">
            <h3><?php echo $categorias->categoria; ?> </h3>
    </div>
    
    <div class="botones">
        <a href="/carta_general" class="boton_verde">Volver</a>
        <a href="/carta_ofertas" class="boton_verde">Carta ofertas</a>
        <a href="/ofertas" class="boton_verde">Ofertas</a>
    </div>
  
    
    <div class="listado">
            <?php foreach($productos as $producto) { ?>
                <ul class="tabla_productos">
                    <div class="base">
                        <div class="imagen">
                            <li><img src="/imagenes_cartas/<?php echo $producto->imagen; ?>" alt="Imagenes">   </li>
                        </div>
                        <div class="texto">
                            <li><h4>    <?php echo $producto->titulo; ?> </h4></li>
                            <li><p>     <?php echo $producto->descripcion; ?></p></li>
                            <div class="contenedor_precios">
                                <?php if($producto->oferta){?>
                                    <div class="precio_ofer">
                                        <li><h5>Precio oferta</h5></li>
                                        <li><h5>     <?php echo $producto->precio_ofer; ?> €</h5></li>
                                    </div>
                                    <?php } else {?>
                                    <div class="precio">
                                        <li><h5>Precio</h5></li>
                                        <li><h5>     <?php echo $producto->precio; ?> €</h5></li>
                                    </div>
                                <?php }?>
                                
                                <div class="precio_med">
                                    <?php if($producto->media) {?>
                                        <li><h5>Precio media</h5></li>
                                        <li><h5>     <?php echo $producto->precio_med; ?> €</h5></li>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </ul>
            <?php } ?>
        </div>



</div>



