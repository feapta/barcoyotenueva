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
            $usuarios = new Usuarios($_POST);
            $alertas = $usuarios->validarLogin();
           
            if(empty($alertas)){
                $usuarios = Usuarios::where_array('email', $usuarios->email);
               
                if( !$usuarios || !$usuarios->confirmado ){
                    // Se verifica que el usuario exita y este confirmado
                    Usuarios::setAlerta('error', 'El usuario no exite o no esta confirmado');
                } else {
                  
                    // Verificamos el password si el usuario esta registrado
                   
                    if( password_verify($_POST['password'], $usuarios->password) ) {
                    // Autentica el usuario
                        session_start();

                        $_SESSION['id'] = $usuarios->id;
                        $_SESSION['nombre'] = $usuarios->nombre . " " . $usuarios->apellidos;
                        $_SESSION['email'] = $usuarios->email;
                        $_SESSION['login'] = true;
                        $_SESSION['admin'] = $usuarios->admin;
                        $_SESSION['imagen'] = $usuarios->imagen;
                        
                        Usuarios::setAlerta('alerta', 'El usuario esta confirmado y registrado');
                        
                        if($usuarios->admin === "1"){
                            $_SESSION['admin'] = $usuarios->admin ?? null;
                            header("Location: /dashboard");

                        }else{
                            header("Location: /usuarios_registrados");
                        }
                   }
                }

            }else{   
                // Mensaje de error si el usuario no esta registrado
                Usuarios::setAlerta('error', 'Usuario no resitrado, porfavor registrese');
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
            
            // Si no hay alertas
            if(empty($alertas)){
                // Verificar que el usuario no este registrado
                $resultado = $usuarios->existeUsuario();
                
                if($resultado->num_rows){
                    // Si esta resgistrado
                    $alertas = Usuarios::getAlertas();
                }else{
                    // No esta registrado
                    
                    $usuarios->hashPassword();

                    $usuarios->crearToken();
                    
                    $nombreImagen = md5( uniqid( rand(), true)) . ".jpg"; 
                                                    
                    if($_FILES['usuarios']['tmp_name']['imagen']){
                        $imagen = Image::make($_FILES['usuarios']['tmp_name']['imagen'])->resize(200, 100);
                        $usuarios->setImagen($nombreImagen, $carpeta);                                   
                    }

                    if(!is_dir($carpeta)){
                        mkdir($carpeta);                                              // Crea la carpeta en el directorio raiz si no esta ya creada
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

        $router->render('usuarios/registro', [
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

    public static function usuarios_registrados(Router $router){
        // Alertas vacias
        $alertas = [];
        $inicio = false;
      
        $router->render('usuarios/usuarios_registrados', [
            'inicio' => $inicio,
            'alertas' => $alertas
        ]);
        
    }

    public static function logout(){
        session_start();

        $_SESSION = [];
        
        header("Location: /");

    }

 


}
 

?>