

<!-- Ofertas de temporada -->

<div class="contenedor contenido_centrado contenedor_ofertas">
    <h3> Ofertas especiales de temporada</h3>
    
    <div class="botones">
        <a href="/" class="boton_verde" type="submit">Volver</a>
    </div>

    <div class="tabla_oferta">
        <ul class="tabla_a">
            <?php foreach($ofertas as $oferta) { ?>
                <li class="seleccion">
                    <img src="/imagenes_ofertas/<?php echo $oferta->imagen; ?>" alt="Imagenes">
                    <h4>    <?php echo $oferta->titulo; ?> </h4>
                    <p>     <?php echo $oferta->descripcion; ?></p>
                    <h5>    <?php echo $oferta->precio; ?> €</h5>
                    <p> Valida hasta:   <?php echo $oferta->valida; ?></p>
                </li>
            <?php } ?>
        </ul>
    </div>

    <div class="botones">
        <a href="/" class="boton_verde" type="submit">Volver</a>
    </div>

</div>

