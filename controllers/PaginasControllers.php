<?php

// Pagina de inicio

namespace Controllers;

use Model\Comen_user;
use Model\Comentarios;
use MVC\Router;

class PaginasControllers{

    public static function index(Router $router){
       /* Listar calificaciones */
        // $calificaciones = Comentarios::get_ultimas(3, 'creada');
        $califica_una = Comentarios::get_aleatorio(1);
        $inicio = true;

        $consulta = " SELECT comentarios.id, comentarios.nombre, comentarios.imagen, comentarios.titulo, ";
        $consulta .=" comentarios.texto, comentarios.estrellas, comentarios.creada, ";
        $consulta .=" usuarios.imagen as imagen_user " ;
        $consulta .=" FROM comentarios LEFT OUTER JOIN usuarios ON comentarios.id_usuario = usuarios.id ";
        $consulta .=" ORDER BY creada DESC LIMIT 3 ";

        $calificaciones = Comen_user::SQL_limit($consulta);

        $router->render('paginas/index', [
            'inicio' => $inicio,
            'calificaciones' => $calificaciones,
            'califica_una' => $califica_una
        ]);
    }

    public static function contacto(Router $router){
        /* Listar calificaciones */
         $inicio = false;
 
         $router->render('paginas/contacto', [
             'inicio' => $inicio,
         ]);
    }

    public static function nosotros(Router $router){
        $inicio = false;

        $router->render('paginas/nosotros', [
            'inicio' => $inicio,
        ]);
    }
    

}


?>