

<!-- Ofertas de temporada -->

<div class="contenedor contenido_centrado tabla">
    
    <div class="contenedor_botones">
        <a href="/" class="boton_light-green-400" type="submit">Volver</a>
    </div>

    <h3> Ofertas de temporada</h3>

    <div class="tabla_oferta">
        <ul class="tabla_a">
            <?php foreach($ofertas as $oferta) { ?>
                <li class="seleccion">
                    <img src="/imagenes_ofertas/<?php echo $oferta->imagen; ?>" alt="Imagenes">
                    <h4>    <?php echo $oferta->titulo; ?> </h4>
                    <p>     <?php echo $oferta->descripcion; ?></p>
                    <h5>    <?php echo $oferta->precio; ?> €</h5>
                    <p> Valida hasta:&nbsp;
                        <?php 
                            $array_dia_semana = array(
                                1=>"Lunes", 
                                2=>"Martes", 
                                3=>"Miércoles", 
                                4=>"Jueves", 
                                5=>"Viernes", 
                                6=>"Sábado",
                                7=>"Domingo" 
                            );
                            $fecha = date_create($oferta->valida);
                            $Unixfecha = date_timestamp_get($fecha);
                            $dia_semana = date('N', $Unixfecha);
                            echo $array_dia_semana[$dia_semana] . " - " .date( "d - m - Y", $Unixfecha);

                        ?>
                    </p>
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
        <a href="/" class="boton_light-green-400" type="submit">Volver</a>
    </div>

</div>

