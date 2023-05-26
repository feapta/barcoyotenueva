
<!-- Pagina carta general -->

<div class="carta_general_productos contenedor_tablas">
    <h3>Listado de productos</h3>

    <div class="contenedor_botones">
        <a href="/admin/crear" class="boton_verde ">Crear producto</a>
    </div>

    <div class="contenedor_tabla">
        <table id="productos" class="display" style="width:100%">
            <thead class="head_tabla">
                <tr>
                    <th>Id</th>
                    <th class="C_imagen">imagen</th>
                    <th>Categoria</th>
                    <th>Oferta</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Media</th>
                    <th>Precio</th>
                    <th>Pre. O</th>
                    <th>Pre. M</th>
                    <th>Creada</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
            </tbody>
        </table>
    </div>
   
</div>

<?php
$script .= '   <script src="/build/js/datatable/productos.js"></script>   '; ?>