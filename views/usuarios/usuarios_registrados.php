
<!-- Pagina principal de los usuarios no administradores -->
    
    <!-- Campos ocultos -->
    <?php if($usuarios->id) { ?>
            <input type="hidden" id="regis" name="califica[regis]" value="<?php echo s($usuarios->confirmado) ?>">
    <?php } ?>
        
    <nav class="barraBotones">
        <button href="/usuarios_registrados" data-paso="1" >Perfil</button>
        <button data-paso="3" >Ofertas</button>
        <button data-paso="4" >Comentar</button>
    </nav> 

<div class="contenedor contenido_centrado usuarios_registrados">

        <?php include_once __DIR__ . "/../templates/alertas.php" ?>
      
        <!-- Perfil  -->
        <div id="paso-1" class="secciones">
            <?php include __DIR__ . '/secciones/seccion_1.php'; ?>
        </div>

        <!-- Ofertas  -->
        <div id="paso-3" class="secciones">
            <?php include __DIR__ . '/secciones/seccion_3.php'; ?>
        </div>

         <!-- Comentarios  -->
        <div id="paso-4" class="secciones">
            <?php include __DIR__ . '/secciones/seccion_4.php'; ?>
        </div>

    </div>
    
</div>

<?php  
    $script .= '<script src="/build/js/usuarios.js"></script>';
    $script .= '<script src="/build/js/mostrar_pass.js"></script>';  
    $script .= '<script src="/build/js/botones_arriba.js"></script>';  
    $script .= '<script src="/build/js/eliminar.js"></script>';  
?>