

<!-- Menus -->

<div class="contenedor contenido_centrado menus">
    <h3>Menus</h3>

    <div class="contenedor_botones">
        <a href="/" class="boton_verde volver" type="submit">Volver</a>
    </div>

    <div class="tabla_oferta">
        <ul class="tabla_a">
            <?php foreach($menus as $oferta) { ?>
                <li class="seleccion">
                    <img src="/imagenes_menus/<?php echo $menus->imagen; ?>" alt="Imagenes">
                    <h4>    <?php echo $menus->titulo; ?> </h4>
                    <p>     <?php echo $menus->descripcion; ?></p>
                    <h5>    <?php echo $menus->precio; ?> €</h5>
                </li>
            <?php } ?>
        </ul>
    </div>

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