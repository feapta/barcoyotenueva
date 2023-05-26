

<!-- Pagina para crear categorias -->

<div class="contenedor contenido_centrado crear_categoria">
    <h3>Crear nueva categoría</h3>

    <div class="contenedor_formulario">

        <?php include_once __DIR__ . "/../../templates/alertas.php" ?>

        <form class="formulario" method="POST" action="/admin/categorias/crear" enctype="multipart/form-data">
            <?php include __DIR__ . '/formulario.php'; ?>
        </form>
    </div>
    
</div>