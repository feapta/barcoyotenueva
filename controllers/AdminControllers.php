<?php

// Administracion controllers

namespace Controllers;

use MVC\Router;
use Model\Comentarios;
use Model\Productos;
use Model\Categorias;
use Model\Usuarios;
use Model\Ofertas;

class AdminControllers{
    
    public static function dashboard(Router $router){
        $cuentaCat = new Categorias;
        $cuentaUsu = new Usuarios;
        $cuentaCom = new Comentarios();
        $cuentaCag = new Productos();
        $cuentaOfe = new Ofertas();
        $productos = Productos::where('oferta', '1'); 
        $cuenta = count($productos);

        $regisCat = $cuentaCat->contar('categorias');
        $regisUsu = $cuentaUsu->contar('usuarios');
        $regisCom = $cuentaCom->contar('comentarios');
        $regisCag = $cuentaCag->contar('productos');
        $regisOfe = $cuentaOfe->contar('ofertas');
 
         $router->render_dash('/admin',[
            "categorias" => $regisCat,
            "usuarios" => $regisUsu,
            "comentarios" => $regisCom,
            "carta_general" => $regisCag,
            "ofertas" => $regisOfe,
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
                elseif ($tipo === 'oferta'){
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
                            'tipo' => 'oferta'
                        ];
                    }

                    echo json_encode($resultado);

                }
            }
        }
    }

}


//                header("Location:" . $_SERVER['HTTP_REFERER']);