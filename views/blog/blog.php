<!-- Blog listado de comentarios --> 

<nav class="barraBotones">
    <button data-paso="1" >Articulos</button>
    <button data-paso="2" >Comentarios</button>
    <button data-paso="3" >Comentar</button>
    <button data-paso="4" >Registrarse</button>
</nav> 

<div class="contenedor contenido_centrado contenedor_blog">

    <div class="secciones" id="paso-1" >
        <?php include __DIR__ . '/secciones/articulos.php'; ?>
    </div>

    <div class="secciones" id="paso-2" >
        <?php include __DIR__ . '/secciones/comentarios.php'; ?>
    </div>
   
    <div class="secciones" id="paso-3" >
        <?php include __DIR__ . '/secciones/comentar.php'; ?>
    </div>
    <div class="secciones" id="paso-4" >
        <?php include __DIR__ . '/../usuarios/registro.php'; ?>
    </div>
</div>

<?php  
    $script .= '<script src="/build/js/botones_arriba.js"></script>';
?>