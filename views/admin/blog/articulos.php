

<!-- Listado de Articulos -->

<div class="contenedor contenedor_tablas">
    <h3>Listado articulos</h3>

    <div class="contenedor_botones">
        <a href="/admin/articulos/crear" class="boton_verde ">Crear</a>
    </div>
    <div class="contenedor_tabla">
        <table id="articulos" class="display" style="width:100%">
            <thead class="head_tabla">
                <tr>
                    <th>Id</th>
                    <th>Imagen</th>
                    <th>Título</th>
                    <th>Texto</th>
                    <th>Creada</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
            </tbody>
        </table>
</div>

<?php
    $script = '<script src="/build/js/datatable/articulos.js"></script>';
?>