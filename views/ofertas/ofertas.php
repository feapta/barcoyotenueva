

<!-- Ofertas de temporada -->

<div class="contenedor contenido_centrado contenedor_ofertas">
    <h3> Ofertas especiales de temporada</h3>
    
    <div class="contenedor_botones">
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
                            //debuguear($dia_semana);
                            echo $array_dia_semana[$dia_semana] . " - " .date( "d - m - Y", $Unixfecha);

                        ?>
                    </p>
                </li>
            <?php } ?>
        </ul>
    </div>

    <div class="contenedor_botones">
        <a href="/" class="boton_verde" type="submit">Volver</a>
    </div>

</div>

