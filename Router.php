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
        //$urlActual = $_SERVER['PATH_INFO'] ?? '/';
        //$urlActual = explode('?', $_SERVER['REQUEST_URI'], 2) ?? '/';           // Solo cambiar cuando se despliega
        //$urlActual = strtok($_SERVER['REQUEST_URI'], '?') ?? '/';
       
        $urlActual = explode('?', $_SERVER['REQUEST_URI'], 2) ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

      if ($method === 'GET') {
          $fn = $this->getRoutes[$urlActual[0]] ?? null;
      } else {
          $fn = $this->postRoutes[$urlActual[0]] ?? null;
      }

      if ( $fn ) {                            // Call user fn va a llamar una función cuando no sabemos cual sera
          call_user_func($fn, $this);         // This es para pasar argumentos
      } else {
          echo "Página no encontrada o ruta no valida";
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
