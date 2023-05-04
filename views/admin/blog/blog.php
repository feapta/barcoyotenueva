

<!-- Pagina adminsitracion del blog -->

<div class="contenedor contenido_centrado contenedor_tablas">
    <h3>Administración del blog</h3>

    <div class="contenedor_tabla">
        <table id="blog" class="display" style="width:100%">
            <thead class="head_tabla">
                <tr>
                    <th>Id</th>
                    <th class="C_imagen">imagen</th>
                    <th>Nombre</th>
                    <th>Titulo</th>
                    <th>Texto</th>
                    <th>estrellas</th>
                    <th>Creada</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
            </tbody>
        </table>
    </div>
   
</div>



<?php
$script .= '
    <script src="/build/js/datatable/blog.js"></script>
    ';
?>