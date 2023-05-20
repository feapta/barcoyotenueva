
<?php

if(!isset($_SESSION)){
    session_start();
}

$auth = $_SESSION['login'] ?? false;
$admin = $_SESSION['admin'] ?? false;
$id_user = $_SESSION['id'] ?? false;
$nombreSolo = $_SESSION['nombreSolo'];

?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bar Coyote</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/build/css/app.css">
</head>


<body class="principal">

    <header class="header <?php echo $inicio ? 'inicio' : '' ?>">
        <div class="contenedor contenido_header">
            <div class="barra">
                <a class="logo" href="/">
                    <img src="/build/img/logo1.png" alt="">
                </a>

                <div class="mobile_menu">
                    <img class="nav_movil" src="/build/img/barras.svg" alt="Icono navegacion resposive">
                </div>

                <nav class="navegacion">
                    <?php if($admin === 'admin'): ?>
                        <a href="/dashboard"><?php echo $nombreSolo?></a>
                    <?php endif?>
                    <?php if($admin === 'usuario'): ?>
                        <a href="/usuarios_registrados?id=<?php echo $id_user?>"><?php echo $nombreSolo?></a>
                    <?php endif?>
                    <a href="/contacto">Contacto</a>
                    <a href="/nosotros">Nosotros</a>
                    <a href="/blog">Blog</a>
                    <a href="/login">Acceso</a>
                    <?php if($auth): ?>
                    <a href="/logout">Cerrar sesión</a>
                    <?php endif?>
                    
                    <img class="dark_mode_boton" src="/build/img/dark-mode.svg" alt="">
                </nav>
            </div>
        </div>
    </header>


    <?php echo $contenido; ?>
        

    <footer class="footer">
        <div class="contenedor contenedor_footer">
            <nav class="navegacion_footer">
                <a href="/contacto">Contacto</a>
                <a href="/nosotros">Nosotros</a>
                <a href="/blog">Blog</a>
                <a href="/login">Acceso</a>
            </nav>
        </div>

        <div class="derechos">
            <?php    $fecha = date('Y');     // Agregamos automaticamente el año ?>
            <p class="copyright">Todos los derechos reservados, Felix AT.<?php echo $fecha ?> &copy;</p>
        </div>
    </footer>


    <script src="/build/js/sweetalert2.js"></script>
    <script src="/build/js/app.js"></script>
    <script src="/build/js/modernizr.js"></script>
    
    <?php echo $script ?? ''; ?>

</body>
</html>