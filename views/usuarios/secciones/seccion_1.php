        
        
<!-- Perfil del usuario -->

    <?php if($usuarios->id){ ?>
        <form  class="contenedor_formulario" method="POST" action="/usuarios/actualizar" enctype="multipart/form-data">
    <?php } else { ?>
        <form  class="contenedor_formulario" method="POST" action="/usuarios_registrados" enctype="multipart/form-data">
    <?php } ?>

            <?php include __DIR__ . '/../formulario.php'; ?>

        </form>

    <div class="cambio_password">
        <form class="contenedor_formulario" method="POST" action="/usuarios/cambiar_pass">
            <div class="campo">
                <label for="password">Password</label>
                <div class="mostrar_password">
                    <input type="password" id="password" name="password" placeholder="Password">
                    <img id="ima-1" class="ocultar"src="/build/img/mostrar.webp" alt="">
                    <img id="ima-2" src="/build/img/esconder.webp" alt="">
                </div>
            </div>
            <input type="submit" value="Guardar" class="boton_verde">
        </form>
    </div>
