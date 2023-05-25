

<!-- Pagina Actualizar de categorias -->


<div class="contenedor contenido_centrado contenedor_actualizar_categorias">
    <h3>Actualizar categorías</h3>

    <div class="contenedo_botones">
        <a href="/categorias" class="boton_verde">Volver</a>
    </div>
    
    <div class="contenedor_formulario">
        <form class="formulario" method="POST" enctype="multipart/form-data">

             <?php include __DIR__ . '/formulario.php'; ?>

             <div class="contenedo_botones">
                <input type="submit" value="Enviar" class="boton_verde">
            </div>
        </form>
    </div>

</div>