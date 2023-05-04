<?php

use GuzzleHttp\Psr7\Message;

define('TEMPLATES_URL', __DIR__ . '/templates');        // Super global de php para que busque la ruta al archivo
define('FUNCIONES_URL',  __DIR__ . 'funciones.php');
define('CARPETA_IMAGEN_USUARIOS', $_SERVER['DOCUMENT_ROOT']. '/imagenes_usuarios/');
define('CARPETA_IMAGEN_CATEGORIAS', $_SERVER['DOCUMENT_ROOT']. '/imagenes_categorias/');
define('CARPETA_IMAGEN_OFERTAS', $_SERVER['DOCUMENT_ROOT']. '/imagenes_ofertas/');
define('CARPETA_IMAGEN_CARTAS', $_SERVER['DOCUMENT_ROOT']. '/imagenes_cartas/');
define('CARPETA_IMAGEN_COMENTARIOS', $_SERVER['DOCUMENT_ROOT']. '/imagenes_comentarios/');


// Se recomienda hacer uso de los tipos de datos
function incluirTemplate(string $nombre, bool $inicio = false ){
    include TEMPLATES_URL . "/{$nombre}.php";
};

function debuguear($variable) {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa el HTML sanitizar los datos recibidos
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

function esUltimo(string $actual, string $proximo): bool {

    if($actual !== $proximo) {
        return true;
    }
    return false;
}

// Función que revisa que el usuario este autenticado
function isAuth() : void {
    if(!isset($_SESSION['login'])) {
        header('Location: /');
    }
}

function isAdmin() : void {
    if(!isset($_SESSION['admin'])) {
        header('Location: /');
    }
}

function validar0Redireccionar(string $url){
    // Validar ID valido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header("Location: $url");
    }
    return $id;
}


// Valida el contenido para eliminar para saber de que tabla deseamos eliminar video 387
function validarTipoContenido($tipo) {
    $tipos = ['producto', 'categoria', 'usuario', 'comentario', 'oferta'];

    return in_array($tipo, $tipos);
}



// Muestra mensajes
function notificaciones($codigo) {
    $mensaje = '';
    
    switch ($codigo) {
        case 1:
            $mensaje = 'Creado correctamente';
            break;
        case 2:
            $mensaje = 'Actualizado correctamente';
            break;
        case 3:
            $mensaje = 'Eliminado correctamente';
            break;
        default:
            $mensaje = false;
            break;
           
        }

        return $mensaje;
}


?>