

<!-- Pagina para crear categorias -->

<div class="contenedor seccion contenido_centrado crear_categoria">
    <h3>Crear nueva categoría</h3>

    <div class="contenedor_formulario">

        <?php include_once __DIR__ . "/../../templates/alertas.php" ?>

        <form class="formulario" method="POST" action="/categorias/crear" enctype="multipart/form-data">
            
            <?php include __DIR__ . '/formulario.php'; ?>
            
            <input type="submit" value="Enviar" class="boton_verde">
        </form>
    </div>
    
</div>