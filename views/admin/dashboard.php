
<?php
    session_start();
    $_SESSION['nombre'] ??'';
    $_SESSION['imagen'] ?? '';
?>

<!-- Pagina principal de administracion -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard-coyote</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/build/css/app.css">

</head>


<body>

    <div class="dashboard">

        <div class="contenedor_aside">
            <div class="conte_cabecera">
                <div class="cabecera">
                    <div class="conte_logo">
                        <a href="/">
                            <img class="logo" src="/build/img/logo1.png" alt="">
                        </a>
                    </div>

                    <div class="conteUsuario">
                        <h4><?php echo $_SESSION['nombre'] ?? ''; ?></h4>
                        <img src="/imagenes_usuarios/<?php echo $_SESSION['imagen']; ?>" alt="Imagen">         
                    </div>

                    <div class="conte_titulo">
                        <a href="/dashboard">Panel de control</a>
                    </div>
                </div>
        

                <aside class="sidebar">
                    <div class="navegaciones">
                        <!-- si se cambia los menus hay que cambiarlo en scss navegaciones -->
                        <!-- paso 1 CATEGORIAS -->
                        <div data-paso_menu="1" class="menu_dash">
                            <img data-paso_menu="1" class="img_navega" src="/build/img/barras.svg" alt="Icono">
                            <span data-paso_menu="1"> Categorías</span>
                        </div>
                        <nav class="navega-1">
                            <a href="/admin/categorias"><img src="/build/img/flecha-dr16-B.png" alt="">   Categorías</a>
                            <a href="/admin/categorias/crear"><img src="/build/img/flecha-dr16-B.png" alt="">   Crear</a>
                        </nav>
                        
                        <!-- paso 2 CARTAS -->
                        <div data-paso_menu="2" class="menu_dash">
                            <img  data-paso_menu="2" class="img_navega" src="/build/img/barras.svg" alt="Icono">
                            <span data-paso_menu="2"> Cartas</span>
                        </div>
                        <nav class="navega-2">
                            <a href="/admin/carta_general"><img src="/build/img/flecha-dr16-B.png" alt="">   Carta</a>
                            <a href="/admin/crear"><img src="/build/img/flecha-dr16-B.png" alt="">   Crear</a>
                        </nav>

                        <!-- paso 3  MENUS-->
                        <div data-paso_menu="3" class="menu_dash">
                            <img  data-paso_menu="3" class="img_navega" src="/build/img/barras.svg" alt="Icono">
                            <span data-paso_menu="3"> Menus</span>
                        </div>
                        <nav class="navega-3">
                            <a href="/menus/listarDash"><img src="/build/img/flecha-dr16-B.png" alt="">   Menus</a>
                            <a href="/menus/crearDash"><img src="/build/img/flecha-dr16-B.png" alt="">   Crear</a>
                        </nav>

                        <!-- paso 4  OFERTAS-->
                        <div data-paso_menu="4" class="menu_dash">
                            <img  data-paso_menu="4" class="img_navega" src="/build/img/barras.svg" alt="Icono">
                            <span data-paso_menu="4"> Ofertas</span>
                        </div>
                        <nav class="navega-4">
                            <a href="/admin/ofertas"><img src="/build/img/flecha-dr16-B.png" alt="">   Ofertas</a>
                            <a href="/admin/crear_oferta"><img src="/build/img/flecha-dr16-B.png" alt="">   Crear</a>
                        </nav>
                        
                        <!-- paso 5 BLOG -->
                        <div data-paso_menu="5" class="menu_dash">
                            <img data-paso_menu="5" class="img_navega" src="/build/img/barras.svg" alt="Icono">
                            <span data-paso_menu="5"> Blog</span>
                        </div>
                        <nav class="navega-5">
                            <a href="/admin/blog"><img src="/build/img/flecha-dr16-B.png" alt="">   Comentarios</a>
                            <a href="/admin/articulos/listar"><img src="/build/img/flecha-dr16-B.png" alt="">   Articulos</a>
                            <a href="/admin/articulos/crear"><img src="/build/img/flecha-dr16-B.png" alt="">   Crea arti.</a>
                        </nav>
                            
                        <!-- paso 6 USUARIOS -->
                        <div data-paso_menu="6" class="menu_dash">
                            <img data-paso_menu="6" class="img_navega" src="/build/img/barras.svg" alt="Icono">
                            <span data-paso_menu="6"> Usuarios</span>
                        </div>
                        <nav class="navega-6">
                            <a href="/user/listado"><img src="/build/img/flecha-dr16-B.png" alt="">   Usuarios</a>
                            <a href="/user/ofertas"><img src="/build/img/flecha-dr16-B.png" alt="">   Ofertas</a>
                            <a href="/user/email"><img src="/build/img/flecha-dr16-B.png" alt="">   Email</a>
                        </nav>

                        <!-- paso Navegacion web 7 -->
                        <div  data-paso_menu="7" class="menu_dash">
                            <img data-paso_menu="7" class="img_navega" src="/build/img/barras.svg" alt="Icono">
                            <span data-paso_menu="7"> Navegación</span>
                        </div>
                        <nav class="navega-7">
                            <a href="/dashboard"><img src="/build/img/flecha-dr16-B.png" alt="">   Admin</a>
                            <a href="/contacto"><img src="/build/img/flecha-dr16-B.png" alt="">   Contacto</a>
                            <a href="/nosotros"><img src="/build/img/flecha-dr16-B.png" alt="">   Nosotros</a>
                            <a href="/blog?1"><img src="/build/img/flecha-dr16-B.png" alt="">   Blog</a>
                            <a href="/login"><img src="/build/img/flecha-dr16-B.png" alt="">   Usuarios</a>
                            <a href=""></a>
                            <img class="dark_mode_boton" src="/build/img/dark-mode.svg" alt="">
                        </nav>
                        <a class="boton_verde" href="https://email.ionos.es/appsuite/?tl=y#!!&app=io.ox/mail&folder=default0/INBOX">Buzón correo</a>
                    </div>
                </aside>
            </div>


            <div class="cerrar_sesion">
                    <a href="/logout" class="cerrar">Cerrar Sesión</a>
            </div>
        </div>

        <div class="contenido_dash">
            <div class="barraDash">
                <p class="relog"></p>
            </div>
            <div class="mobile_dash">
                <img class="nav_dash" src="/build/img/barras.svg" alt="Icono">
            </div>

            <div>
                <?php echo $contenido_dash ?? '' ;?>
            </div>

        </div>

    </div>

    <script src="/build/js/sweetalert2.js"></script>
    <script src="/build/js/dashboard.js"></script>
    <script src="/build/js/modernizr.js"></script>
    <script src="/build/js/relog.js"></script>
        
    <script src="/build/js/datatable/jquery-3-6-4.js"></script>
    <script src="/build/js/datatable/datatables.js"></script>
    <script src="/build/js/eliminar.js"></script>
    <script src="/build/js/darkMode.js"></script>
    
    <?php echo $script ?? '' ; ?>

</body>
</html>