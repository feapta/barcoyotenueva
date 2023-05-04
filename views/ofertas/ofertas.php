

<!-- Ofertas de temporada -->

<div class="contenedor contenido_centrado contenedor_ofertas">
    <h3> Ofertas especiales de temporada</h3>
    
    <div class="botones">
        <a href="/" class="boton_verde" type="submit">Volver</a>
    </div>

    <div class="tabla_oferta">
        <?php foreach($ofertas as $oferta) { ?>
            <ul class="tabla_a">
                <li class="seleccion">
                        <img src="/imagenes_ofertas/<?php echo $oferta->imagen; ?>" alt="Imagenes">
                        <h4>    <?php echo $oferta->titulo; ?> </h4>
                        <p>     <?php echo $oferta->descripcion; ?></p>
                        <h6>    <?php echo $oferta->precio; ?> €</h6>
                        <h6> Valida hasta:   <?php echo $oferta->valida; ?></h6>
                    </a>
                </li>
            </ul>
        <?php } ?>
    </div>

    <div class="botones">
        <a href="/" class="boton_verde" type="submit">Volver</a>
    </div>

</div>

