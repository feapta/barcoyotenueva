

<!-- Categorias de la carta -->

<div class="contenedor contenido_centrado cartas">
    <h3>Carta de ofertas</h3>
    <p>Todos los productos incluyen una bebida.</p>

    <div class="contenedor_botones">
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

    <h5>Cuidado con las alergias</h5>
    <div class="alergias">
        <img loading="lazy" src="build/img/alergenos/1.webp" alt="Imagen">
        <img loading="lazy" src="build/img/alergenos/2.webp" alt="Imagen">
        <img loading="lazy" src="build/img/alergenos/3.webp" alt="Imagen">
        <img loading="lazy" src="build/img/alergenos/4.webp" alt="Imagen">
        <img loading="lazy" src="build/img/alergenos/5.webp" alt="Imagen">
        <img loading="lazy" src="build/img/alergenos/6.webp" alt="Imagen">
        <img loading="lazy" src="build/img/alergenos/7.webp" alt="Imagen">
        <img loading="lazy" src="build/img/alergenos/8.webp" alt="Imagen">
        <img loading="lazy" src="build/img/alergenos/9.webp" alt="Imagen">
        <img loading="lazy" src="build/img/alergenos/10.webp" alt="Imagen">
        <img loading="lazy" src="build/img/alergenos/11.webp" alt="Imagen">
        <img loading="lazy" src="build/img/alergenos/12.webp" alt="Imagen">
        <img loading="lazy" src="build/img/alergenos/13.webp" alt="Imagen">
        <img loading="lazy" src="build/img/alergenos/14.webp" alt="Imagen">
    </div>

    <div class="contenedor_botones">
        <a href="/" class="boton_verde volver" type="submit">Volver</a>
    </div>
</div>
