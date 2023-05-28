<?php

// Administracion controllers

namespace Controllers;

use Model\Articulos;
use MVC\Router;
use Model\Comentarios;
use Model\Productos;
use Model\Categorias;
use Model\Usuarios;
use Model\Ofertas;
use Model\Menus;
use Model\Ofertas_user;

class AdminControllers{
    
    public static function dashboard(Router $router){
        session_start();
        isAdmin();                  // Para proteger el acceso al panel de control

        $cuentaCat = new Categorias;
        $cuentaUsu = new Usuarios;
        $cuentaCom = new Comentarios();
        $cuentaCag = new Productos();
        $cuentaMen = new Menus();
        $productos = Productos::where('oferta', '1'); 
        $cuenta = count($productos);

        $regisCat = $cuentaCat->contar('categorias');
        $regisUsu = $cuentaUsu->contar('usuarios');
        $regisCom = $cuentaCom->contar('comentarios');
        $regisCag = $cuentaCag->contar('productos');
        $menus = $cuentaMen->contar('menus');
 
         $router->render_dash('/admin',[
            "categorias" => $regisCat,
            "usuarios" => $regisUsu,
            "comentarios" => $regisCom,
            "carta_general" => $regisCag,
            "menus" => $menus,
            "cuentas" => $cuenta
         ]);

    }
 
    /* Eliminar*/
    public static function eliminar(Router $router) {
   
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tipo = $_POST['tipo'];
           
            // peticiones validas
            if(validarTipoContenido($tipo) ) {
                if($tipo === 'producto'){
                    $carpeta = CARPETA_IMAGEN_CARTAS;
                    $producto = Productos::find($_POST['id']);

                    if($producto->imagen){
                        $imagen = $producto->imagen;
                        $producto->setImagen($imagen, $carpeta);
                    }

                    $resultado = $producto->eliminar();
                                    
                    if($resultado){
                        $resultado =   [
                            'resultado' => $resultado,
                            'tipo' => 'producto'
                        ];
                    }

                    echo json_encode($resultado);
                } 
                elseif ($tipo === 'categoria'){
                    $carpeta = CARPETA_IMAGEN_CATEGORIAS;
                    $producto = Categorias::find($_POST['id']);

                    if($producto->imagen){
                        $imagen = $producto->imagen;
                        $producto->setImagen($imagen, $carpeta);
                    }

                    $resultado = $producto->eliminar();                

                    if($resultado){
                        $resultado =   [
                            'resultado' => $resultado,
                            'tipo' => 'categoria'
                        ];
                    }

                    echo json_encode($resultado);
                } 
                elseif ($tipo === 'usuario_regis'){
                    $carpeta = CARPETA_IMAGEN_USUARIOS;
                    $producto = Usuarios::find($_POST['id']);

                    if($producto->imagen){
                        $imagen = $producto->imagen;
                        $producto->setImagen($imagen, $carpeta);
                    }

                    $resultado = $producto->eliminar();                

                    if($resultado){
                        $resultado =   [
                            'resultado' => $resultado,
                            'tipo' => 'usuario_regis'
                        ];
                    }

                    echo json_encode($resultado);
                } 
                elseif ($tipo === 'usuario'){
                    $carpeta = CARPETA_IMAGEN_USUARIOS;
                    $producto = Usuarios::find($_POST['id']);

                    if($producto->imagen){
                        $imagen = $producto->imagen;
                        $producto->setImagen($imagen, $carpeta);
                    }

                    $resultado = $producto->eliminar();                

                    if($resultado){
                        $resultado =   [
                            'resultado' => $resultado,
                            'tipo' => 'usuario'
                        ];
                    }

                    echo json_encode($resultado);
                } 
                elseif ($tipo === 'comentario'){
                    $carpeta = CARPETA_IMAGEN_COMENTARIOS;
                    $producto = Comentarios::find($_POST['id']);

                    if($producto->imagen){
                        $imagen = $producto->imagen;
                        $producto->setImagen($imagen, $carpeta);
                    }

                    $resultado = $producto->eliminar();                

                    if($resultado){
                        $resultado =   [
                            'resultado' => $resultado,
                            'tipo' => 'comentario'
                        ];
                    }

                    echo json_encode($resultado);

                } 
                elseif ($tipo === 'menus'){
                    $carpeta = CARPETA_IMAGEN_MENUS;
                    $menus = Menus::find($_POST['id']);

                    if($menus->imagen){
                        $imagen = $menus->imagen;
                        $menus->setImagen($imagen, $carpeta);
                    }

                    $resultado = $menus->eliminar();                

                    if($resultado){
                        $resultado =   [
                            'resultado' => $resultado,
                            'tipo' => 'menus'
                        ];
                    }

                    echo json_encode($resultado);

                }
                elseif ($tipo === 'oferta_temporal'){
                    $carpeta = CARPETA_IMAGEN_OFERTAS;
                    $producto = Ofertas::find($_POST['id']);

                    if($producto->imagen){
                        $imagen = $producto->imagen;
                        $producto->setImagen($imagen, $carpeta);
                    }

                    $resultado = $producto->eliminar();                

                    if($resultado){
                        $resultado =   [
                            'resultado' => $resultado,
                            'tipo' => 'oferta_temporal'
                        ];
                    }

                    echo json_encode($resultado);

                }
                elseif ($tipo === 'oferta_regis'){
                    $carpeta = CARPETA_IMAGEN_OFERTAS;
                    $producto = Ofertas_user::find($_POST['id']);

                    if($producto->imagen){
                        $imagen = $producto->imagen;
                        $producto->setImagen($imagen, $carpeta);
                    }

                    $resultado = $producto->eliminar();                

                    if($resultado){
                        $resultado =   [
                            'resultado' => $resultado,
                            'tipo' => 'oferta_regis'
                        ];
                    }

                    echo json_encode($resultado);

                }
                elseif ($tipo === 'articulo'){
                    $carpeta = CARPETA_IMAGEN_ARTICULOS;
                    $producto = Articulos::find($_POST['id']);

                    if($producto->imagen){
                        $imagen = $producto->imagen;
                        $producto->setImagen($imagen, $carpeta);
                    }

                    $resultado = $producto->eliminar();                

                    if($resultado){
                        $resultado =   [
                            'resultado' => $resultado,
                            'tipo' => 'articulo'
                        ];
                    }

                    echo json_encode($resultado);

                }
            }
        }
    }

}


//                header("Location:" . $_SERVER['HTTP_REFERER']);