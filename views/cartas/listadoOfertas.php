

 <!-- Listado cartas -->

<div class="contenedor listado_cartas">
    <div class="titulo">
        <h3> <?php echo $categorias->categoria . " en oferta"; ?> 
        </h3>
     </div>
    
    <div class="botones">
        <a href="/" class="boton_verde">Volver</a>
        <a href="/carta_general" class="boton_verde">Carta general</a>
        <a href="/carta_ofertas" class="boton_verde">Carta ofertas</a>
        <a href="/ofertas" class="boton_verde">Ofertas</a>
    </div>
  
    <?php include_once __DIR__ . '/../templates/alertas.php'; ?>
    
        <ul>
            <?php foreach($productos as $producto) { ?>
                <li>

                    <div class="imagen">
                        <img src="/imagenes_cartas/<?php echo $producto->imagen; ?>" alt="Imagenes">
                    </div>

                    <div class="texto">
                        <h4>    <?php echo $producto->titulo; ?></h4>
                        <p>     <?php echo $producto->descripcion; ?></p>
                        
                        <div class="contenedor_precios">
                                <div class="precio_ofer">
                                <h5>Precio oferta</h5>
                                <h5>     <?php echo $producto->precio_ofer; ?> €</h5>
                                </div>
                                
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



