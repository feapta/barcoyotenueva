
<div class="contenedor articulos">
    <ul class="uno">
        <?php foreach($articulos as $articulo) { ?>
            <li>
                <div class="articulo">
                    <h5><?php echo $articulo->titulo;    ?></h5>
                    <img loading="lazy" src="/imagenes_articulos/<?php echo $articulo->imagen; ?>" alt="Imagen">
                    <pre class="parrafo"><?php echo $articulo->parrafo;    ?></pre>
                    <p><?php echo $articulo->creada;    ?></p>
                </div>
            </li>
        <?php }?>
    </ul>
</div>