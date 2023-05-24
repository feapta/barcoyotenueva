<?php

// Cartas controllers

namespace Controllers;

use Model\Productos;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Categorias;
use Model\Ofertas;

class ProductosControllers{
        
        // Listar carta general por categorias
        public static function listar(Router $router){
            $inicio = false;
            $categorias = Categorias::allOrdenAlfa('categoria');

            $router->render('cartas/carta_general', [
                'inicio' => $inicio,
                'categoria' => $categorias
            ]);
        }

        // listar carta general por categoria
        public static function listar_post(Router $router){
            $inicio = false;
            $id = validar0Redireccionar('/admin/carta_general');  
            $catego = Categorias::where_array('id', $id);
            $productos = Productos::whereOrderAlfa('categoria', $catego->categoria, 'titulo');
            
            if(!$productos){
                Productos::setAlerta('error', 'Lo sentimos, pero no hemos encontrado ofertas');
            }

            $alertas = Productos::getAlertas();

            $router->render('cartas/listado', [
                'inicio' => $inicio,
                'productos' => $productos,
                'categorias' => $catego,
                'alertas' => $alertas

            ]);
        }


        // Listar carta ofertas por categoria
        public static function carta_ofertas(Router $router){
            $inicio = false;
            $categorias = Categorias::allOrdenAlfa('categoria');

            $router->render('cartas/carta_ofertas', [
                'inicio' => $inicio,
                'categoria' => $categorias
            ]);
        }
        // listar carta ofertas por categoria
        public static function carta_ofertas_post(Router $router){
            $inicio = false;
            $id = validar0Redireccionar('/admin/carta_ofertas');  
            $catego = Categorias::where_array('id', $id);
            $productos = Productos::allOrdenAlfaCartaOfertas('categoria', $catego->categoria, 'titulo');
            
            if(!$productos){
                Productos::setAlerta('error', 'Lo sentimos, pero no hemos encontrado ofertas');
            }

            $alertas = Productos::getAlertas();

            $router->render('/cartas/listado', [
                'inicio' => $inicio,
                'productos' => $productos,
                'categorias' => $catego,
                'alertas' => $alertas

            ]);
        }

        // Listar ofertas de temporada
        public static function listar_ofertas(Router $router){
            $inicio = false;
            $fecha =  date('Y/m/d');
            $ofertas = Ofertas::allOrdenAlfaCartaOfertasporFecha('titulo', $fecha );

            if(!$ofertas){
                Ofertas::setAlerta('error', 'Lo sentimos, pero no hemos encontrado ofertas');
            }

            $alertas = Ofertas::getAlertas();

            $router->render('/ofertas/ofertas', [
                'inicio' => $inicio,
                'ofertas' => $ofertas,
                'alertas' => $alertas
            ]);
        }




    //  ADMINISTRACION  ///////////////////////////////////////

    // Listar carta general
        public static function listar_dash_carta_G(Router $router){
            $mensaje= '';

            $router->render_dash('/cartas/carta_general', [
                'mensaje' => $mensaje

            ]);   
        }
        public static function listar_dash_carta_G_P(Router $router){
            $productos = Productos::all();
            $categorias = Categorias::all();

            foreach($productos as $data){
            $json['data'][] = $data;
            }

            $jsonstring = json_encode($json);
            echo $jsonstring;

            $router->render_dash('/dashboard', []);    
        }

        // Listar carta ofertas
        public static function listar_dash_carta_O(Router $router){

            $router->render_dash('cartas/carta_ofertas', [ ]);
        }
        public static function listar_dash_carta_O_P(Router $router){
            $productos = Productos::where('oferta', '1');

            foreach($productos as $data){
                $json['data'][] = $data;
                }
        
                $jsonstring = json_encode($json);
                echo $jsonstring;
        
            $router->render_dash('/dashboard', [ ]);
        }


        // Crear producto
        public static function crear_producto(Router $router){
            $alertas = [];
            $carpeta = CARPETA_IMAGEN_CARTAS;
            $categorias = Categorias::all();
            $productos = new Productos();
            
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $productos = new Productos($_POST['producto']);
                $categoria = new Categorias($_POST['categoria']);
                $productos->categoria = $categoria->id;

                // Seccion para subir imagenes
                $nombreImagen = md5( uniqid( rand(), true)) . ".jpg";

                if($_FILES['producto']['tmp_name']['imagen']){
                    $imagen = Image::make($_FILES['producto']['tmp_name']['imagen'])->resize(350, 300);
                    $productos->setImagen($nombreImagen, $carpeta);                                   
                }

                $alertas = $productos->validar();
                if(empty($alertas)){
                    
                    $imagen->save($carpeta . $nombreImagen);                         // Guarda la imagen en el disco duro con la libreria intervention
                    $productos->guardar();
            
                    header('Location: /admin/carta_general');
                }
            }

            $router->render_dash('/cartas/crear', [
                'alertas' => $alertas,
                'productos' => $productos,
                'categorias' =>$categorias

            ]);
        }

        // Actualizar productos
        public static function actualizar_producto(Router $router){
            $id = validar0Redireccionar('/admin/carta_general');  
            $productos = Productos::find($id);
            $catego = Categorias::find_categoria($productos->categoria);
            $categorias = Categorias::all();

            $alertas = [];
            $carpeta = CARPETA_IMAGEN_CARTAS;

            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $args = $_POST['producto'];
                $productos->sincronizar($args);

                // Validacion
                $alertas = $productos->validar();
        
                // Generar nombre unico para cada imagen
                $nombreImagen = md5( uniqid( rand(), true)) . ".jpg"; // 
                
                // Setear la imagen a la clase
                if($_FILES['producto']['tmp_name']['imagen']){
                    $imagen = Image::make($_FILES['producto']['tmp_name']['imagen'])->resize(350, 250);
                    $productos->setImagen($nombreImagen,  $carpeta);                                   
                }

                // Inserta el registro en la base de datos si no hay errores
                if(empty($alertas)){
                    if($_FILES['producto']['tmp_name']['imagen']){
                        $imagen->save($carpeta . $nombreImagen);
                    }
                    
                    $productos->guardar();
                    header('Location: /admin/carta_general');
                }
            }

            $router->render_dash('/cartas/actualizar', [
                'productos' => $productos,
                'categorias' => $categorias,
                'catego' => $catego,
                'alertas' => $alertas
            ]);
        }
        
}

