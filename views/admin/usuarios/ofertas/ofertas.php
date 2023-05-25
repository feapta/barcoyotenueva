

<!-- Ofertas para los de usuarios registrados-->

<div class="contenedor contenedor_tablas">
    <h3>Ofertas para los usuarios registrados</h3>

        
    <div class="contenedor_botones">
        <a href="/user/crear_ofertas" class="boton_verde ">Crear oferta</a>
    </div>

    <div class="contenedor_tabla">
        <table id="oferta_regis" class="display" style="width:100%">
            <thead class="head_tabla">
                <tr>
                    <th>Id</th>
                    <th>imagen</th>
                    <th>Titulo</th>
                    <th>Descrip.</th>
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

<?php
    $script = '<script src="/build/js/datatable/ofertas_regis.js"></script>';
?>