

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

</div>