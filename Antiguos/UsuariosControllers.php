<?php

// Registro de usuarios

namespace Controllers;

use Classes\Email;
use Model\Usuarios;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;


class UsuariosControllers{
    
    public static function login(Router $router){
        $alertas = [];
        $inicio = false;
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new Usuarios($_POST);
            $alertas = $auth->validarLogin();
                      
             if(empty($alertas)){
                 $usuarios = Usuarios::where_array('email', $auth->email);

                 if($usuarios){
                    if( $usuarios->comprobaciones($auth->password)){    // Se verifica que el usuario exita y este confirmado
                        session_start();

                        $_SESSION['id'] = $usuarios->id;
                        $_SESSION['nombre'] = $usuarios->nombre . " " . $usuarios->apellidos;
                        $_SESSION['email'] = $usuarios->email;
                        $_SESSION['login'] = true;
                        $_SESSION['admin'] = $usuarios->admin;
                        $_SESSION['imagen'] = $usuarios->imagen;

                        if($usuarios->admin === "1"){
                            $_SESSION['admin'] = $usuarios->admin ?? null;
                            header("Location: /dashboard");
                        }
                        else{
                            UsuariosControllers::usuarios_registrados($router, $usuarios->id );
                        }
                    }
                 } 
                 else{
                    Usuarios::setAlerta('error', 'Usuario no encontrado');
                }
             }
         }
        
        $alertas = Usuarios::getAlertas();
 
        $router->render('usuarios/login',[
            'inicio' => $inicio,
            'alertas' => $alertas
        ]);
        
    }

    public static function registro(Router $router){
        $usuarios = new Usuarios;
        $inicio = false;
        $alertas = [];
        $carpeta = CARPETA_IMAGEN_USUARIOS;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $usuarios = new Usuarios($_POST['usuarios']);

            $usuarios->sincronizar($_POST);
            $alertas = $usuarios->validarNuevaCuenta();
            
            if(empty($alertas)){                                     // Si no hay alertas
                $resultado = $usuarios->existeUsuario();            // Verificar que el usuario no este registrado
                
                if($resultado->num_rows){
                    $alertas = Usuarios::getAlertas();              // Si esta resgistrado
                }
                else {                                              // No esta registrado
                    $usuarios->hashPassword();

                    $usuarios->crearToken();
                    
                    $nombreImagen = md5( uniqid( rand(), true)) . ".jpg"; 
                                                    
                    if($_FILES['usuarios']['tmp_name']['imagen']){
                        $imagen = Image::make($_FILES['usuarios']['tmp_name']['imagen'])->resize(200, 100);
                        $usuarios->setImagen($nombreImagen, $carpeta);                                   
                    }

                    $imagen->save($carpeta . $nombreImagen);                         // Guarda la imagen en el disco duro con la libreria intervention
                    
                    // Envio email
                    $email = new Email($usuarios->email, $usuarios->nombre, $usuarios->token);
                    $email->enviarConfirmacion();
                    
                    // Crear usuario
                    $resultado = $usuarios->guardar();

                    if($resultado){
                        header("Location: /mensaje");
                    }
                
                }
            }
        }

        $router->render('/usuarios/registro', [
            'inicio' => $inicio,
            'usuarios' => $usuarios,
            'alertas' => $alertas
        ]);
    }

    public static function olvidado(Router $router){
         $inicio = false;
       
         $router->render('usuarios/olvidado', [
             'inicio' => $inicio,
         ]);
    }

    public static function mensaje(Router $router){
        $inicio = false;
        $alertas = [];

        $router->render('/usuarios/mensaje', [
            'inicio' => $inicio,
            'alertas' => $alertas
        ]);
    }

    public static function confirmar(Router $router){
        $alertas = [];
        $token = s($_GET['token']);
        $usuarios = Usuarios::where_array('token', $token);
        
        if(empty($usuarios)){
            // Mostrar mensaje de error porque no hay usuario
            Usuarios::setAlerta('error', 'Token no valido');
            
        }else{
            
            //Modificar el valor de confirmado
            $usuarios->confirmado = '1';
            $usuarios->token = null;
            $usuarios->guardar();

            Usuarios::setAlerta('exito', 'Cuenta confirmada');
        }

        // Crea la alerta
        $alertas = Usuarios::getAlertas();

        // Renderizar la vista
        $router->render('/usuarios/confirmar', [
            'alertas' => $alertas
        ]);
        
    }

    public static function usuarios_registrados(Router $router, $id){
        $alertas = [];
        $inicio = false;
        $usuarios = Usuarios::where_array('id', $id);

        $router->render('/usuarios/usuarios_registrados', [
            'inicio' => $inicio,
            'alertas' => $alertas,
            'usuarios' => $usuarios
        ]);
        
    }


    public static function logout(){
        session_start();

        $_SESSION = [];
        
        header("Location: /");

    }

    public static function actualizar(Router $router){
        $alertas = [];
        $carpeta = CARPETA_IMAGEN_USUARIOS;
        $usuarios = new Usuarios;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $usuarios = Usuarios::find($_POST['usuarios']['id']);
            $args = $_POST['usuarios'];
            $usuarios->sincronizar($args);
           
            $alertas = $usuarios->validar();                                // Validacion

            $nombreImagen = md5( uniqid( rand(), true)) . ".jpg";           // Generar nombre unico para cada imagen
            
            if($_FILES['usuarios']['tmp_name']['imagen']){                  // Setear la imagen a la clase
                $imagen = Image::make($_FILES['usuarios']['tmp_name']['imagen'])->resize(350, 250);
                $usuarios->setImagen($nombreImagen, $carpeta);                                   
               }

             // Inserta el registro en la base de datos si no hay errores
            if(empty($alertas)){
                if($_FILES['usuarios']['tmp_name']['imagen']){
                    $imagen->save($carpeta . $nombreImagen);
                }

                $usuarios->guardar();
                header('Location: /usuarios_registrados');
             }
        }

         $router->render_dash('/usuarios/usuarios_registrados', [
            'usuarios' => $usuarios,
            'alertas' => $alertas
        ]);
    }


}

?>