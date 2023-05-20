

<!-- Categorias de la carta -->

<div class="contenedor contenido_centrado cartas">
    <h3>Carta de ofertas</h3>
    <p>Todos los productos incluyen una bebida.</p>

    <div class="contenedorBotones">
        <a href="/" class="boton_verde volver" type="submit">Volver</a>
    </div>

    <ul class="tabla">
        <?php foreach($categoria as $cate) { ?>
            <li class="seleccion">
                <a href="/cartaOfertasPost?id=<?php echo $cate->id; ?>" >
                    <h4> <?php echo $cate->categoria; ?> </h4>
                    <img src="/imagenes_categorias/<?php echo $cate->imagen; ?>" alt="Imagenes">
                </a>
            </li>
        <?php } ?>
    </ul>

    <div class="contenedorBotones">
        <a href="/" class="boton_verde volver" type="submit">Volver</a>
    </div>
</div>
