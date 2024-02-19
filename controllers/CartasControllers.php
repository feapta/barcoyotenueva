<?php

// Cartas controllers

namespace Controllers;

use Model\Cartas;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Categorias;

class CartasControllers{
    
    // Listar cartas
    public static function listar(Router $router){
        $inicio = false;
        $categorias = Categorias::all();

        $router->render('cartas/carta_general', [
            'inicio' => $inicio,
            'categoria' => $categorias
        ]);
    }

    // listar productos por categoria
     public static function listar_post(Router $router){
        $inicio = false;
        $id = validar0Redireccionar('/admin/carta_general');  
        $catego = Categorias::where_array('id', $id);
        $productos = Cartas::where('categoria', $catego->categoria);
        
        $router->render('cartas/listado', [
            'inicio' => $inicio,
            'productos' => $productos,
            'categorias' => $catego

        ]);
    }

    public static function ofertas(Router $router){
        $inicio = false;
    
        $router->render('cartas/ofertas_tem', [
            'inicio' => $inicio,

        ]);
    }

    public static function carta_ofertas(Router $router){
        $inicio = false;
    
        $router->render('cartas/carta_ofertas', [
            'inicio' => $inicio,

        ]);
    }





    // Listar carta general
    public static function listar_dash_G(Router $router){
        $productos = Cartas::all();
        foreach($productos as $data){
          $json['data'][] = $data;
        }

        $jsonstring = json_encode($json);
        echo $jsonstring;
        
        $router->render_dash('cartas/carta_general', [
            'productos' => $productos
        ]);
            

      
     
    }


    // Listar carta ofertas
    public static function listar_dash_O(Router $router){

        $router->render_dash('cartas/carta_ofertas', [


        ]);
    }
 
    // Listar cartas
    public static function listar_dash_T(Router $router){

        $router->render_dash('cartas/oferta', [
   

        ]);
    }
 

    // Crear producto
    public static function crear_producto(Router $router){
        $alertas = [];
        $carpeta = CARPETA_IMAGEN_CARTAS;
        $categorias = Categorias::all();
        $productos = new Cartas;
        

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $productos = new Cartas($_POST['producto']);
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
                if(!is_dir($carpeta)){
                    mkdir($carpeta);                                              // Crea la carpeta en el directorio raiz si no esta ya creada
                }
                
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
        $productos = Cartas::find($id);
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