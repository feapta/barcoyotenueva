<?php

// Modelo de usuarios

namespace Model;

class Usuarios extends ActiveRecord {
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'apellidos', 'email', 'password', 'telefono', 'imagen', 'recibir', 'admin', 'confirmado', 'token', 'creada'];

    public $id;
    public $nombre;
    public $apellidos;
    public $email;
    public $password;
    public $telefono;
    public $imagen;
    public $recibir;
    public $admin;
    public $confirmado;
    public $token;
    public $creada;


    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellidos = $args['apellidos'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->recibir = $args['recibir'] ?? '0';
        $this->admin = $args['admin'] ?? '0';
        $this->confirmado = $args['confirmado'] ?? '0';
        $this->token = $args['token'] ?? '';
        $this->creada = date('Y/m/d');
    }


    // Mensajes de validacion para la creacion de una cuenta
    public function validarNuevaCuenta(){

        if(!$this->nombre){
            self::$alertas['error'] [] = 'El nombre es obligatorio';
        }
        if(!$this->email){
            self::$alertas['error'] [] = 'El email es obligatorio';
        }
        if(!$this->password){
            self::$alertas['error'] [] = 'El password es obligatorio';
        }
        if(strlen($this->password) < 6 ){
            self::$alertas['error'] [] = 'El password debe contener al menos 6 caracteres';
        }
        return self::$alertas;
    }

    // Mensajes de validacion para el login y password
    public function validarLogin(){
        if(!$this->email){
            self::$alertas['error'] [] = 'El email es obligatorio';
        }
        if(!$this->password){
            self::$alertas['error'] [] = 'El password es obligatorio';
        }
        return self::$alertas;
    }

    // Validar email si se olvido contraseña
    public function validarEmail(){
        if(!$this->email){
            self::$alertas['error'] [] = 'El email es obligatorio';
        }   
        return self::$alertas;
    }

    // Validar email si se olvido contraseña
    public function validarPassword(){
        if(!$this->password){
            self::$alertas['error'] [] = 'El password es obligatorio';
        }
        if(strlen($this->password) < 6 ){
            self::$alertas['error'] [] = 'El password debe contener al menos 6 caracteres';
        }
        return self::$alertas;
    }

    // Comprobar el password confirmado y verificado
    public function comprobaciones($password) {
        $resultado = password_verify($password, $this->password);
        if(!$resultado || !$this->confirmado) {
            self::$alertas['error'][] = 'Password Incorrecto o tu cuenta no ha sido confirmada';
        } else {
            return true;
        }
    }

    // Comprobar si exite cuenta
    public function existeUsuario(){
        $query = " SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1"; 
        $resultado = self::$db->query($query);

        if($resultado->num_rows){
            self::$alertas['error'] [] = 'El usuario ya esta registrado';
        }
        return $resultado;
    }

    // Hashear password
    public function hashPassword(){
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    // Crear un token unico
    public function crearToken(){
        $this->token = uniqid();    //Genera un numero unico, sirve para generar id unico y se cambia cada vez que actualizas
    }

    public function autentificado($usuarios){
        $_SESSION['id'] = $usuarios->id;
        $_SESSION['nombre'] = $usuarios->nombre . " " . $usuarios->apellidos;
        $_SESSION['email'] = $usuarios->email;
        $_SESSION['login'] = true;
        
        session_start();
        
        if($usuarios->admin === "1"){
            $_SESSION['admin'] = $usuarios->admin ?? null;
            header("Location: /dashboard");

        }else{
            header("Location: /usuarios_registrados");
        }

    }

}