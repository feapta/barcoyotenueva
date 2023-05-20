<?php

// Registro de usuarios

namespace Controllers;

use Classes\Email_user;
use Model\Comentarios;
use Model\Usuarios;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Ofertas_user;

class Usuarios_regisControllers{

    public static function usuarios_registrados(Router $router){
        session_start();
        $alertas = [];
        $inicio = false;
        $id = $_GET['id'];

        isAuth();           // Comprueba que el usuario estar autentificado

        $usuarios = Usuarios::where_array('id', $id);
        $ofertas = Ofertas_user::all();

        $router->render('/usuarios/usuarios_registrados', [
            'inicio' => $inicio,
            'alertas' => $alertas,
            'usuarios' => $usuarios,
            'ofertas' => $ofertas
        ]);
        
    }

    // Listar usuarios registrados
    public static function listar_user(Router $router){
     $usuarios = Usuarios::all();

        $router->render_dash('/usuarios/listado', [
            'usuarios' => $usuarios
        ]);
    }
    public static function listar_user_P(Router $router){
     $usuarios = Usuarios::all();
     
     foreach($usuarios as $data){
        $json['data'][] = $data;
        }

        $jsonstring = json_encode($json);
        echo $jsonstring;

        $router->render_dash('/dashboard', []);   

    }
    
    // Crear ofertas para usuarios registrados
    public static function crear_ofertas_user(Router $router){
        $alertas = [];
        $ofertas = new Ofertas_user();
        $carpeta = CARPETA_IMAGEN_OFERTAS;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $ofertas = new Ofertas_user($_POST['oferta']);
            
            $nombreImagen = md5( uniqid( rand(), true)) . ".jpg";                   // Seccion para subir imagenes

            if($_FILES['oferta']['tmp_name']['imagen']){
                $imagen = Image::make($_FILES['oferta']['tmp_name']['imagen'])->resize(350, 250);
                $ofertas->setImagen($nombreImagen, $carpeta);                                   
            }

            $alertas = $ofertas->validar();
            if(empty($alertas)){
                  
                $imagen->save($carpeta . $nombreImagen);                         // Guarda la imagen en el disco duro con la libreria intervention
                
                $ofertas->guardar();
            
                header('Location: /user/ofertas');
            }
        }

        $router->render_dash('/usuarios/crear', [
            'alertas' => $alertas,

        ]);
    }

    // Administracion del listado de ofertas de usuarios registrados
    public static function listar_ofertas_user(Router $router){
        $ofertas = Ofertas_user::all();
   
           $router->render_dash('/usuarios/ofertas', [
               'ofertas' => $ofertas
           ]);
    }
    public static function listar_ofertas_user_P(Router $router){
        $ofertas = Ofertas_user::all();

        foreach($ofertas as $data){
            $json['data'][] = $data;
        }

        $jsonstring = json_encode($json);
        echo $jsonstring;

        $router->render_dash('/dashboard', []);   

    }

  
    // Muestra la pagina de envio de email
    public static function email_user(Router $router){
        $router->render_dash('/usuarios/email', []);
    }

    // Enviar correos a los usuarios
    public static function enviar_mail(){
        $usuario = ($_POST)['email'];
        
        $usuarios = explode(',', $usuario);

        $email = new Email_user($usuarios);
        $email->envio_A_User();
    }

    // Dejar comentarios
    public static function dejar_user(){
        $carpeta = CARPETA_IMAGEN_COMENTARIOS;

        $califica = new Comentarios($_POST['califica']);
        $id_usuario = $califica->id_usuario;
        $nombreImagen = md5( uniqid( rand(), true)) . ".jpg";                   // Seccion para subir imagenes
            
        if($_FILES['califica']['tmp_name']['imagen']){
            $imagen = Image::make($_FILES['califica']['tmp_name']['imagen'])->resize(350, 250);
            $califica->setImagen($nombreImagen, $carpeta);                                   
            }
        
            $imagen->save($carpeta . $nombreImagen);                         // Guarda la imagen en el disco duro con la libreria intervention
            
            $califica->guardar();

           header("Location: /usuarios_registrados?id=$id_usuario");
        }
       

  
}

?>