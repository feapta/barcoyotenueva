

 <!-- Listado cartas -->

 <div class="contenedor listado_cartas">

    <div class="contenedor_botones">
        <a href="/" class="boton_verde">Inicio</a>
        <a href="/ofertas" class="boton_verde">Ofertas</a>
        <a href="/menus" class="boton_verde">Menus</a>
        <a href="/carta_general" class="boton_verde">Carta</a>
    </div>
  
    <div class="titulo">
        <h3>  <?php echo $categorias->categoria; ?> </h3>
    </div>

    <?php include_once __DIR__ . '/../templates/alertas.php'; ?>
    
        <ul class="tabla">
            <?php foreach($productos as $producto) { ?>
                <li class="seleccion">

                    <div class="imagen">
                        <img src="/imagenes_cartas/<?php echo $producto->imagen; ?>" alt="Imagenes">
                    </div>

                    <div class="texto">
                        <h4>    <?php echo $producto->titulo; ?></h4>
                        <p>     <?php echo $producto->descripcion; ?></p>
                        
                        <div class="contenedor_precios">
                            <?php if($producto->precio != 0) {?>
                                <div class="precio">
                                <h5>Precio</h5>
                                <h5>     <?php echo $producto->precio; ?> €</h5>
                                </div>
                            <?php } else {?>
                                 <div class="precio">
                                <h5>Precio oferta</h5>
                                <h5>     <?php echo $producto->precio_ofer; ?> €</h5>
                                </div>
                            <?php }?>
                           
                                
                            <div class="precio_med">
                                <?php if($producto->media) {?>
                                <h5>Precio media</h5>
                                <h5>     <?php echo $producto->precio_med; ?> €</h5>
                                <?php }?>
                            </div>
                        </div>

                    </div>

                </li>
            <?php } ?>
        </ul>

</div>



