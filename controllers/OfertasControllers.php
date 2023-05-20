<?php

// Controlador de Ofertas

namespace Controllers;

use Model\Ofertas;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;



class OfertasControllers {

    // Listar ofertas
    public static function listar_dash_O(Router $router){
        $router->render_dash('/ofertas/ofertas', [ ]);
    }

    public static function listar_dash_O_P(Router $router){
        $ofertas = Ofertas::all();

        foreach($ofertas as $data){
            $json['data'][] = $data;
            }
    
            $jsonstring = json_encode($json);
            echo $jsonstring;

        $router->render_dash('/dashboard', [ ]);
    }
    
    public static function crear_oferta(Router $router){
        $alertas = [];
        $ofertas = new Ofertas();
        $carpeta = CARPETA_IMAGEN_OFERTAS;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $ofertas = new Ofertas($_POST['oferta']);
            
            $nombreImagen = md5( uniqid( rand(), true)) . ".jpg";                   // Seccion para subir imagenes

            if($_FILES['oferta']['tmp_name']['imagen']){
                $imagen = Image::make($_FILES['oferta']['tmp_name']['imagen'])->resize(350, 250);
                $ofertas->setImagen($nombreImagen, $carpeta);                                   
            }

            $alertas = $ofertas->validar();
            if(empty($alertas)){
                  
                $imagen->save($carpeta . $nombreImagen);                         // Guarda la imagen en el disco duro con la libreria intervention
                
                $ofertas->guardar();
            
                header('Location: /admin/ofertas');
            }
        }

        $router->render_dash('/ofertas/crear', [
            'alertas' => $alertas,
            'ofertas' => $ofertas

        ]);
    }

    public static function actualizar_oferta(Router $router){
        $id = validar0Redireccionar('/ofertas/ofertas');
        $ofertas = ofertas::find($id);
        $alertas = [];
        $carpeta = CARPETA_IMAGEN_OFERTAS;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $args = $_POST['oferta'];
            $ofertas->sincronizar($args);
            // Validacion
            $alertas = $ofertas->validar();
    
            // Generar nombre unico para cada imagen
            $nombreImagen = md5( uniqid( rand(), true)) . ".jpg"; // 

            if($_FILES['oferta']['tmp_name']['imagen']){            // Setear la imagen a la clase
                $imagen = Image::make($_FILES['oferta']['tmp_name']['imagen'])->resize(350, 250);
                $ofertas->setImagen($nombreImagen, $carpeta);                                   
               }
            
            if(empty($alertas)){                                     // Inserta el registro en la base de datos si no hay errores
                if($_FILES['oferta']['tmp_name']['imagen']){
                    $imagen->save($carpeta . $nombreImagen);
                }
               
                $ofertas->guardar();

                header('Location: /admin/ofertas');
             }
        }

         $router->render_dash('/ofertas/actualizar', [
            'ofertas' => $ofertas,
            'alertas' => $alertas
        ]);
    }



}



?>