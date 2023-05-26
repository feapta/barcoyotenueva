<?php

// Registro de usuarios

namespace Controllers;

use Classes\Email;
use Model\Usuarios;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class UsuariosControllers{

    // Login para usuarios
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
                        $_SESSION['nombreSolo'] = $usuarios->nombre;
                        $_SESSION['email'] = $usuarios->email;
                        $_SESSION['login'] = true;
                        $_SESSION['admin'] = $usuarios->admin;
                        $_SESSION['imagen'] = $usuarios->imagen;

                        if($usuarios->admin === "1"){
                            session_start();
                            $_SESSION['admin'] = 'admin';
                            $_SESSION['nombre'] = $usuarios->nombre . " " . $usuarios->apellidos;
                            $_SESSION['imagen'] = $usuarios->imagen;
                            header("Location: /dashboard");
                        }
                        else{
                            session_start();
                            $_SESSION['admin'] = 'usuario';
                            $_SESSION['id'];
                            header("Location: /usuarios_registrados?id=$usuarios->id");
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

    // Formulario de registro de usuarios
    public static function registro(Router $router){
        $usuarios = new Usuarios;
        $inicio = false;
        $alertas = [];
        $carpeta = CARPETA_IMAGEN_USUARIOS;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $usuarios = new Usuarios($_POST['usuarios']);

            $usuarios->sincronizar($_POST);
            
            $alertas = $usuarios->validarNuevaCuenta();
            
            if(empty($alertas)){                                        // Si no hay alertas
                $resultado = $usuarios->existeUsuario();                // Verificar que el usuario no este registrado
                
                if($resultado->num_rows){
                    $alertas = Usuarios::getAlertas();                  // Si esta resgistrado
                }
                else {                                                  // No esta registrado
                    $usuarios->hashPassword();

                    $usuarios->crearToken();
                    
                    $nombreImagen = md5( uniqid( rand(), true)) . ".jpg"; 
                                                    
                    if($_FILES['usuarios']['tmp_name']['imagen']){
                        $imagen = Image::make($_FILES['usuarios']['tmp_name']['imagen'])->resize(200, 100);
                        $usuarios->setImagen($nombreImagen, $carpeta);                                   
                    }
               
                    $imagen->save($carpeta . $nombreImagen);                                            // Guarda la imagen en el disco duro con la libreria intervention
                    
                    $email = new Email($usuarios->email, $usuarios->nombre, $usuarios->token);          // Envio email
                    $email->enviarConfirmacion();
                    $resultado = $usuarios->guardar();                                                  // Crear usuario

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

    // Password olvidado
    public static function olvidado(Router $router){    
        $inicio = false;
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Usuarios($_POST);
           
            $alertas = $auth->validarEmail();
            if(empty($alertas)) {
                $usuario = Usuarios::where_array('email', $auth->email);

                if($usuario && $usuario->confirmado === "1") {
                     
                    $usuario->crearToken();                                                     // Generar un token
                    $usuario->guardar();                                                        // Guardar el token

                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);     //  Envia el email
                    $email->enviarInstrucciones();

                    Usuarios::setAlerta('exito', 'Revisa su email');                            // Alerta de exito
                 } else {
                     Usuarios::setAlerta('error', 'El Usuario no existe o no esta confirmado'); // Alerta de error
                 }
            } 
        }

        $alertas = Usuarios::getAlertas();

        $router->render('/usuarios/olvidado', [
            'inicio' => $inicio,
            'alertas' => $alertas
        ]);
        
    }
    // Recuperar password
    public static function recuperar(Router $router) {
        $token = s($_GET['token']);
        $mostrar = true;

        if(!$token) header('Location: /');

        $usuario = Usuarios::where_array('token', $token);                 // Identificar el usuario con este token

        if(empty($usuario)) {
            Usuarios::setAlerta('error', 'Token No Válido');
            $mostrar = false;
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);                                  // Añadir el nuevo password
            $alertas = $usuario->validarPassword();                         // Validar el password

            if(empty($alertas)) {
                $usuario->hashPassword();                                   // Hashear el nuevo password
                
                $usuario->token = null;                                     // Eliminar el Token

                $resultado = $usuario->guardar();                           // Guardar el usuario en la BD
                
                if($resultado) {                                            // Redireccionar
                    header('Location: /');
                }
            }
        }

        $alertas = Usuarios::getAlertas();

        $router->render('/usuarios/recuperar', [
            'titulo' => 'Reestablecer Password',
            'alertas' => $alertas,
            'mostrar' => $mostrar
        ]);
    }

    // Mensaje para confirmar cuenta
    public static function mensaje(Router $router){
        $inicio = false;

        $router->render('/usuarios/mensaje', [
            'inicio' => $inicio,
        ]);
    }

    // Confirmacion de cuenta eliminando el token
    public static function confirmar(Router $router){
        $alertas = [];
        $token = s($_GET['token']);
        $usuarios = Usuarios::where_array('token', $token);
        
        if(empty($usuarios)){
            Usuarios::setAlerta('error', 'Token no valido');    // Mostrar mensaje de error porque no hay usuario
        }
        else {
            $usuarios->confirmado = '1';                    //Modificar el valor de confirmado
            $usuarios->token = null;
            $usuarios->guardar();

            Usuarios::setAlerta('exito', 'Cuenta confirmada');
        }

       
        $alertas = Usuarios::getAlertas();                   // Crea la alerta

        // Renderizar la vista
        $router->render('/usuarios/confirmar', [
            'alertas' => $alertas
        ]);
        
    }

    // Actualiza los datos del usuario
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
            
            if(empty($alertas)){                                             // Inserta el registro en la base de datos si no hay errores
                if($_FILES['usuarios']['tmp_name']['imagen']){
                    $imagen->save($carpeta . $nombreImagen);
                }

                $usuarios->guardar();
                header("Location: /usuarios_registrados?id=$usuarios->id");
             }
        }

         $router->render('/usuarios/usuarios_registrados', [
            'usuarios' => $usuarios,
            'alertas' => $alertas
        ]);
    }

    // El usuario cambia su password
    public static function cambiar_pass(Router $router){
        $alertas = [];
        $inicio = false;
        $pass = Usuarios::where_array('id', $_POST['usuarios']['id']);
        $alertas = $pass->validarPassword();
        
        if(empty($alertas)){
            $pass->password = null;
            $usuario =  $_POST['usuarios']['password_nuevo'];           // Password que llega nuevo
            
            $pass->password = $usuario;                                 // Lo asignamos a la variable password del usuario
            $pass->hashPassword();                                      // Haseamos el password

            $pass->guardar();                                             // Lo guardamos
        }

        $router->render('/usuarios/usuarios_registrados', [
            'alertas' => $alertas,
            'inicio' => $inicio,
            'usuarios' => $pass,
        ]);

    }

     // Cierra la sesion del usuario
    public static function logout(){
        session_start();

        $_SESSION = [];
        
        header("Location: /");

    }

}

?>