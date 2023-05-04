

<!-- Categorias de la carta -->

<div class="contenedor seccion contenido_centrado carta_general">

    <div class="cabecera">
        <h3>Carta general</h3>
        <p>Aqui les presentamos los productos que siempre nos acompañan.</p>
        
        <div>
            <a href="/" class="boton_verde volver" type="submit">Volver</a>
        </div>
        
        <div class="tabla_categorias">
            <?php foreach($categoria as $cate) { ?>
                <ul class="tabla_a">
                    <li class="seleccion">
                        <a href="/cartas/listado?id=<?php echo $cate->id; ?>" >
                            <h4> <?php echo $cate->categoria; ?> </h4>
                            <img src="/imagenes_categorias/<?php echo $cate->imagen; ?>" alt="Imagenes">
                        </a>
                    </li>
                </ul>
            <?php } ?>
        </div>

        <div>
            <a href="" class="boton_verde" type="submit">Volver</a>
        </div>
    </div>
</div>
