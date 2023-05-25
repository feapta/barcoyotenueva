<?php

// Comentarios controllers

namespace Controllers;

use Model\Comentarios;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Articulos;
use Model\Comen_user;

class BlogControllers{
    
    // Blog
    public static function blog(Router $router){
         $inicio = false;

            $consulta = " SELECT comentarios.id, comentarios.nombre, comentarios.imagen, comentarios.titulo, ";
            $consulta .=" comentarios.texto, comentarios.estrellas, comentarios.creada,";
            $consulta .=" usuarios.imagen as imagen_user ";
            $consulta .=" FROM comentarios LEFT OUTER JOIN usuarios ON comentarios.id_usuario = usuarios.id ";
            $consulta .=" ORDER BY creada DESC ";

        $comentarios = Comen_user::SQL($consulta);
        $articulos = Articulos::all();

         $router->render('blog/blog', [
             'inicio' => $inicio,
             'calificaciones' => $comentarios,
             'articulos' => $articulos
         ]);
    }

    // Dejar comentario usuarios no registrados
    public static function dejar(Router $router){
        $comentario = new Comentarios;
         $inicio = false;
         $alertas = [];
         $carpeta = CARPETA_IMAGEN_COMENTARIOS;
         
         if($_SERVER['REQUEST_METHOD'] === 'POST'){
             $comentario = new Comentarios($_POST['califica']);
             
             $nombreImagen = md5( uniqid( rand(), true)) . ".jpg";                      // Seccion para subir imagenes
             
            if($_FILES['califica']['tmp_name']['imagen']){
                 $imagen = Image::make($_FILES['califica']['tmp_name']['imagen'])->resize(150, 150);
                 $comentario->setImagen($nombreImagen, $carpeta);                                   
            }
                
            $alertas = $comentario->validar();
                
            if(empty($alertas)){
                $imagen->save($carpeta . $nombreImagen);                         // Guarda la imagen en el disco duro con la libreria intervention
                
                $comentario->guardar();
                
                header('Location: /blog');
            }
         }

         $router->render('/blog/blog', [
             'inicio' => $inicio,
             'califica' => $comentario,
             'alertas' => $alertas         
         ]);
    }



    
    // Adminsitracion blog
    public static function listarComentarios(Router $router){
         $router->render_dash('/blog/blog', [ ]);
    }

    public static function listarComentarios_P(Router $router){
         $comentarios = Comentarios::all();
         foreach($comentarios as $data){
            $json['data'][] = $data;
            }
    
            $jsonstring = json_encode($json);
            echo $jsonstring;
       
         $router->render_dash('/dashboard', []);
    }

    public static function listarArticulo(Router $router){
        $router->render_dash('/blog/articulos', [ ]);
    }

    public static function listarArticulo_P(Router $router){
        $articulos = Articulos::all();
        foreach($articulos as $data){
           $json['data'][] = $data;
           }
   
           $jsonstring = json_encode($json);
           echo $jsonstring;
      
        $router->render_dash('/dashboard', []);
    }

    public static function crearArticulo(Router $router){
        $alertas = [];
        $carpeta = CARPETA_IMAGEN_ARTICULOS;
        $articulos = new Articulos();
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $articulos = new Articulos($_POST['articulo']);

            // Seccion para subir imagenes
            $nombreImagen = md5( uniqid( rand(), true)) . ".jpg";

            if($_FILES['articulo']['tmp_name']['imagen']){
                $imagen = Image::make($_FILES['articulo']['tmp_name']['imagen'])->resize(350, 300);
                $articulos->setImagen($nombreImagen, $carpeta);                                   
               }

            $alertas = $articulos->validar();
            if(empty($alertas)){
                
                $imagen->save($carpeta . $nombreImagen);                         // Guarda la imagen en el disco duro con la libreria intervention
                $articulos->guardar();
         
                header('Location: /admin/articulos/listar');
            }
        }

        $router->render_dash('/blog/crearArticulos', []);

    }

    public static function actualizarArticulo(Router $router){
        $id = validar0Redireccionar('/admin/articulos/listar');  
        $articulo = Articulos::find($id);
        $alertas = [];
        $carpeta = CARPETA_IMAGEN_ARTICULOS;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $args = $_POST['articulo'];
            $articulo->sincronizar($args);

            // Validacion
            $alertas = $articulo->validar();
    
            // Generar nombre unico para cada imagen
            $nombreImagen = md5( uniqid( rand(), true)) . ".jpg"; // 
            
            // Setear la imagen a la clase
            if($_FILES['articulo']['tmp_name']['imagen']){
                $imagen = Image::make($_FILES['articulo']['tmp_name']['imagen'])->resize(350, 250);
                $articulo->setImagen($nombreImagen,  $carpeta);                                   
               }

             // Inserta el registro en la base de datos si no hay errores
            if(empty($alertas)){
                if($_FILES['articulo']['tmp_name']['imagen']){
                    $imagen->save($carpeta . $nombreImagen);
                }
                
                $articulo->guardar();
                header('Location: /admin/articulos/listar');
             }
        }

        $router->render_dash('/blog/actualizarArticulos', [
            'alertas' => $alertas,
            'articulo' => $articulo
        ]);

    }

}