
<!-- Pagina carta general -->

    
<div class="contenedor_tablas contenido_centrado carta_general_productos">
    <h3>Carta general</h3>

    <div class="boton">
        <a href="/admin/crear" class="boton_verde ">Crear producto</a>
    </div>
    
    <div class="control_registros">
        <select name="num_registros" id="num_registros" class="form-select">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
        </select>

        <div class="row">
            <div class="col-6">
                <label id="lbl-total"></label>
            </div>

            <div class="col-6" id="nav-paginacion"></div>

            <input type="hidden" id="pagina" value="1">
            <input type="hidden" id="orderCol" value="0">
            <input type="hidden" id="orderType" value="asc">
        </div>

        <input type="text" placeholder="Busqueda">
    </div>


    <table class="tabla_productos">
            <thead class="tabla_head">
                <tr class="tabla_cabecera_productos">
                    <th class="C_imagen">imagen</th>
                    <th>Id</th>
                    <th>Categoria</th>
                    <th>Oferta</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Media</th>
                    <th>Precio</th>
                    <th>Precio O</th>
                    <th>Precio M</th>
                    <th>Creada</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

        <tbody>
            <?php foreach($productos as $producto) { ?>
                <tr class="body_productos">
                    <th><img  class="P_imagen" src="/imagenes_cartas/<?php echo $producto->imagen ?>"></th>
                    <th><p class="P_id">         <?php echo $producto->id ?>              </p></th>
                    <th><p class="P_categoria">  <?php echo $producto->categoria?>   </p></th>
                    <th><p class="P_oferta">     <?php if($producto->oferta === '0'){echo $producto->oferta = "No";} if($producto->oferta === '1'){echo $producto->oferta = "Si";}?> </p></th>
                    <th><h4 class="P_titulo">    <?php echo $producto->titulo ?>          </h4></th>
                    <th><p class="P_descripcion"><?php echo $producto->descripcion ?>    </p></th>
                    <th><p class="P_media">       <?php if($producto->media === '0'){echo $producto->media = "No";} if($producto->media === '1'){echo $producto->media = "Si";}?> </p></th>
                    <th><p class="P_precio">     <?php echo $producto->precio ?>          </p></th>
                    <th><p class="P_precio_O">   <?php echo $producto->precio_ofer ?>     </p></th>
                    <th><p class="P_precio_M">   <?php echo $producto->precio_med ?>      </p></th>
                    <th><p class="P_creada">     <?php echo $producto->creada ?>          </p></th>
                    <th><a href="/admin/actualizar?id=<?php echo $producto->id; ?>"><img class="P_actualizar" src="/build/img/actualizado.png"> </a></th>
                    <th><a href=""><img class="P_eliminar" src="/build/img/papelera-de-reciclaje.png"></th></a>       </th>
                </tr>
            <?php } ?>
        </tbody>
    </table>

   
</div>

<script src="/build/js/cartas.js"></script>