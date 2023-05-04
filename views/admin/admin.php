
<!-- Pagina dashboard -->

<div class="contenedor contenido_centrado panel_control">
    <h3>Panel de control</h3>
    
    <div class="contenido">
        <div class="informe CG">
            <h4>Carta general</h4>
            <?php foreach($carta_general as $carta_gen) { ?>
                <p><?php echo $carta_general; ?></p>
            <?php } ?>
        </div>

        <div class="informe CO">
            <h4>Carta ofertas</h4>
                <p><?php echo $cuentas; ?></p>
        </div>

        <div class="informe O">
            <h4>Ofertas</h4>
            <?php foreach($ofertas as $ofer) { ?>
                <p><?php echo $ofer; ?></p>
            <?php } ?>
        </div>

        <div class="informe C">
            <a href="/categorias">
                <h4>Categorias</h4>
                <?php foreach($categorias as $categoria) { ?>
                    <?php echo $categoria; ?>
                <?php } ?>
            </a>
        </div>

        <div class="informe U">
            <h4>Usuarios</h4>
            <?php foreach($usuarios as $usuario) { ?>
                <p><?php echo $usuario; ?></p>
            <?php } ?>
        </div>

        <div class="informe B">
            <h4>Blog</h4>
            <?php foreach($comentarios as $comenta) { ?>
                <p><?php echo $comenta; ?></p>
            <?php } ?>
        </div>
    </div>
</div>