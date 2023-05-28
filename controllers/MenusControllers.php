<?php

// Cartas controllers

namespace Controllers;

use Model\Menus;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class MenusControllers{
        
        // Listar menus al publico
        public static function menusListar(Router $router){
            $inicio = false;
            $menus = Menus::all();

            $router->render('menus/menus', [
                'inicio' => $inicio,
                'menus' => $menus
            ]);
        }


    //  ADMINISTRACION  ///////////////////////////////////////

    // Listar carta general
        public static function menusListarDash(Router $router){

            $router->render_dash('/admin/menus/menus', [

            ]);   
        }
        public static function menusListarDash_P(Router $router){
            $menus = Menus::all();

            foreach($menus as $data){
            $json['data'][] = $data;
            }

            $jsonstring = json_encode($json);
            echo $jsonstring;

            $router->render_dash('/dashboard', []);    
        }

        // Crear menu
        public static function menusCrearDash(Router $router){
            $alertas = [];
            $carpeta = CARPETA_IMAGEN_MENUS;
            $menus = new Menus();
            
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $menus = new Menus($_POST['producto']);

                // Seccion para subir imagenes
                $nombreImagen = md5( uniqid( rand(), true)) . ".jpg";

                if($_FILES['menu']['tmp_name']['imagen']){
                    $imagen = Image::make($_FILES['menu']['tmp_name']['imagen'])->resize(350, 300);
                    $menus->setImagen($nombreImagen, $carpeta);                                   
                }

                $alertas = $menus->validar();
                if(empty($alertas)){
                    
                    $imagen->save($carpeta . $nombreImagen);                         // Guarda la imagen en el disco duro con la libreria intervention
                    $menus->guardar();
            
                    header('Location: /admin/menus/listarDash');
                }
            }

            $router->render_dash('/admin/menus/', [
                'alertas' => $alertas,
                'productos' => $menus,

            ]);
        }

        // Actualizar menu
        public static function menusActualizarDash(Router $router){
            $id = validar0Redireccionar('/admin/menus/listarDash');  
            $menus = Menus::find($id);

            $alertas = [];
            $carpeta = CARPETA_IMAGEN_MENUS;

            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $args = $_POST['menu'];
                $menus->sincronizar($args);

                // Validacion
                $alertas = $menus->validar();
        
                // Generar nombre unico para cada imagen
                $nombreImagen = md5( uniqid( rand(), true)) . ".jpg"; // 
                
                // Setear la imagen a la clase
                if($_FILES['menu']['tmp_name']['imagen']){
                    $imagen = Image::make($_FILES['menu']['tmp_name']['imagen'])->resize(350, 250);
                    $menus->setImagen($nombreImagen,  $carpeta);                                   
                }

                // Inserta el registro en la base de datos si no hay errores
                if(empty($alertas)){
                    
                    $menus->guardar();
                    header('Location: /admin/menus/listarDash');
                }
            }

            $router->render_dash('/admin/menus/', [
                'productos' => $menus,
                'alertas' => $alertas
            ]);
        }
        
}

