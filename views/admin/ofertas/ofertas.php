
<!-- Pagina ofertas -->

<div class="contenedor contenedor_tablas">
    <h3>Ofertas de temporada</h3>
    
    <div class="contenedor_botones">
        <a href="/admin/crear_oferta" class="boton_verde ">Crear oferta</a>
    </div>

    <div class="contenedor_tabla">
        <table id="ofertas" class="display" style="width:100%">
            <thead class="head_tabla">
                <tr>
                    <th>Id</th>
                    <th class="C_imagen">imagen</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>valida</th>
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
    $script .= '
        <script src="/build/js/datatable/ofertas.js"></script>
    ';
?>