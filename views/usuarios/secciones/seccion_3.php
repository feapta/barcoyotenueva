

<!-- Ofertas -->

<div class="contenedor contenedor_ofertas_usuarios">
    <div class="tabla">
        <?php foreach($ofertas as $oferta) { ?>
            <ul>
                <li>
                    <img src="/imagenes_ofertas/<?php echo $oferta->imagen; ?>" alt="Imagenes">
                    <h4>    <?php echo $oferta->titulo; ?> </h4>
                    <p>     <?php echo $oferta->descripcion; ?></p>
                    <h5>    <?php echo $oferta->precio; ?> €</h5>
                    <p> Valida hasta:   <?php echo $oferta->valida; ?></p>
                </li>
            </ul>
        <?php } ?>
    </div>
</div>