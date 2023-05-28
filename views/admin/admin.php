
<!-- Pagina dashboard -->

<div class="contenedor contenido_centrado panel_control">
    <h3>Panel de control</h3>
    
    <div class="contenido">
        <div class="informe">
            <h4>Carta general</h4>
            <?php foreach($productos as $producto) { ?>
                <p><?php echo $producto; ?></p>
            <?php } ?>
        </div>

        <div class="informe">
            <h4>Menus</h4>
            <?php foreach($menus as $menu) { ?>
                <p><?php echo $menu; ?></p>
            <?php } ?>
        </div>

        <div class="informe">
            <h4>Ofertas</h4>
            <?php foreach($ofertas as $ofer) { ?>
                <p><?php echo $ofer; ?></p>
            <?php } ?>
        </div>

        <div class="informe">
                <h4>Categorias</h4>
                <?php foreach($categorias as $categoria) { ?>
                    <p><?php echo $categoria; ?></p>
                <?php } ?>
        </div>

        <div class="informe">
            <h4>Usuarios</h4>
            <?php foreach($usuarios as $usuario) { ?>
                <p><?php echo $usuario; ?></p>
            <?php } ?>
        </div>

        <div class="informe">
            <h4>Blog</h4>
            <?php foreach($comentarios as $comenta) { ?>
                <p><?php echo $comenta; ?></p>
            <?php } ?>
        </div>
    </div>
</div>