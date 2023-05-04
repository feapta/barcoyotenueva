<?php

namespace MVC;

class Router {
    public array $getRoutes = [];
    public array $postRoutes = [];

    // GET
    public function get($url, $fn) {
        $this->getRoutes[$url] = $fn;
    }

    // POST
    public function post($url, $fn) {
        $this->postRoutes[$url] = $fn;
    }

    // Comprobar rutas
    public function comprobarRutas() {
        // Proteger Rutas...
        // session_start();

        // Arreglo de rutas protegidas...
        // $rutas_protegidas = ['/admin', '/propiedades/crear', '/propiedades/actualizar', '/propiedades/eliminar', '/vendedores/crear', '/vendedores/actualizar', '/vendedores/eliminar'];

        // $auth = $_SESSION['login'] ?? null;
   
        //$currentUrl = $_SERVER['PATH_INFO'] ?? '/';
        $currentUrl = $_SERVER['REQUEST_URI'] === '' ? '/' :  $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET') {
            $fn = $this->getRoutes[$currentUrl] ?? null;
        } else {
            $fn = $this->postRoutes[$currentUrl] ?? null;
        }

        if ( $fn ) {                            // Call user fn va a llamar una función cuando no sabemos cual sera
            call_user_func($fn, $this);         // This es para pasar argumentos
            
        } else {
            echo "Página No Encontrada o Ruta no válida";
        }
    }

    // Muestra las paginas
    public function render($view, $datos = []){

        // Leer lo que le pasamos  a la vista
        foreach ($datos as $key => $value) {
            $$key = $value;  // Doble signo de dolar significa: variable variable, básicamente nuestra variable sigue siendo la original, pero al asignarla a otra no la reescribe, mantiene su valor, de esta forma el nombre de la variable se asigna dinamicamente
        }

        ob_start();                                     // Almacenamiento en memoria durante un momento...
        include_once __DIR__ . "/views/$view.php";      // entonces incluimos la vista en el layout
        $contenido = ob_get_clean();                    // Limpia el Buffer
        include_once __DIR__ . '/views/master.php';     // Pagina maestra que muestra el contenido de la variable contenido
    }



    // Muestra las paginas del dashboard
    public function render_dash($view, $datos = []){

        // Leer lo que le pasamos  a la vista
        foreach ($datos as $key => $value) {
            $$key = $value;  // Doble signo de dolar significa: variable variable, básicamente nuestra variable sigue siendo la original, pero al asignarla a otra no la reescribe, mantiene su valor, de esta forma el nombre de la variable se asigna dinamicamente
        }

        ob_start();                                                 // Almacenamiento en memoria durante un momento...
        include_once __DIR__ . "/views/admin/$view.php";            // entonces incluimos la vista en el layout
        $contenido_dash = ob_get_clean();                           // Limpia el Buffer
        include_once __DIR__ . '/views/admin/dashboard.php';        // Pagina maestra que muestra el contenido de la variable contenido
    }
}
