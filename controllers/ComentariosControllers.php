<?php

// Comentarios controllers

namespace Controllers;

use Model\Comentarios;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class ComentariosControllers{
    
    public static function listado(Router $router){
        /* Listar todas las calificaciones */
         $calificaciones = Comentarios::all_ultimas();
         $inicio = false;
       
         $router->render('blog/listado', [
             'inicio' => $inicio,
             'calificaciones' => $calificaciones
         ]);
    }

    public static function dejar(Router $router){
         $blog = new Comentarios($_POST['califica']);

         $inicio = false;
         $alertas = [];
         $carpeta = CARPETA_IMAGEN_USUARIOS;
         
         if($_SERVER['REQUEST_METHOD'] === 'POST'){
             // Seccion para subir imagenes
             $nombreImagen = md5( uniqid( rand(), true)) . ".jpg"; // 
             
             if($_FILES['califica']['tmp_name']['imagen']){
                 $imagen = Image::make($_FILES['califica']['tmp_name']['imagen'])->resize(150, 150);
                 $blog->setImagen($nombreImagen, $carpeta);                                   
                }
                
                $alertas = $blog->validar();

             if(empty($alertas)){
                 $imagen->save($carpeta . $nombreImagen);                         // Guarda la imagen en el disco duro con la libreria intervention
                 $blog->guardar();
                 
                 header('Location: /');
             }
         }

         $router->render('/blog/dejar', [
             'inicio' => $inicio,
             'califica' => $blog,
             'alertas' => $alertas         
         ]);
    }


// Adminsitracion blog
    public static function listar(Router $router){
       
         $router->render_dash('/blog/blog', [ ]);
    }
    public static function listar_P(Router $router){
         $comentarios = Comentarios::all();
         foreach($comentarios as $data){
            $json['data'][] = $data;
            }
    
            $jsonstring = json_encode($json);
            echo $jsonstring;
       
         $router->render_dash('/dashboard', []);
    }
}