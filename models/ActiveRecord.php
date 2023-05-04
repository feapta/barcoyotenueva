<?php

namespace Model;

use mysqli;

class ActiveRecord {

    // Base DE DATOS
    protected static $db;
    protected static $tabla = '';
    protected static $columnasDB = [];
    protected $id = [];
    protected $imagen = [];

    // Alertas y Mensajes
    protected static $alertas = [];
    
    // Definir la conexión a la BD - includes/database.php
    public static function setDB($database) {
        self::$db = $database;
    }

    public static function setAlerta($tipo, $mensaje) {
        static::$alertas[$tipo][] = $mensaje;
    }

    // Alertas
    public static function getAlertas() {
        return static::$alertas;
    }

    // Validación
    public function validar() {
        static::$alertas = [];
        return static::$alertas;
    }

    // Consulta SQL para crear un objeto en Memoria
    public static function consultarSQL($query) {
        // Consultar la base de datos
        $resultado = self::$db->query($query);

        // Iterar los resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        // liberar la memoria
        $resultado->free();

        // retornar los resultados
        return $array;
    }

    // Crea el objeto en memoria que es igual al de la BD
    protected static function crearObjeto($registro) {
        $objeto = new static;

        foreach($registro as $key => $value ) {
            if(property_exists( $objeto, $key  )) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    // Identificar y unir los atributos de la BD
    public function atributos() {
        $atributos = [];
        foreach(static::$columnasDB as $columna) {
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    // Sanitizar los datos antes de guardarlos en la BD
    public function sanitizarAtributos() {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach($atributos as $key => $value ) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    // Sincroniza BD con Objetos en memoria
    public function sincronizar($args=[]) { 
        foreach($args as $key => $value) {
        if(property_exists($this, $key) && !is_null($value)) {
            $this->$key = $value;
        }
        }
    }

    // Registros - CRUD
    public function guardar() {
        $resultado = '';
       
        if(!is_null($this->id)) {
            $resultado = $this->actualizar();   // actualizar
        } else {
            $resultado = $this->crear();        // Crear
        }
        return $resultado;
    }

    // crea un nuevo registro
    public function crear() {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Insertar en la base de datos
        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' "; 
        $query .= join("', '", array_values($atributos));
        $query .= "') ";
        
        // Resultado de la consulta
        $resultado = self::$db->query($query);

        return [
           'resultado' =>  $resultado,
           'id' => self::$db->insert_id,
        ];
    }

    // Actualizar el registro
    public function actualizar() {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Iterar para ir agregando cada campo de la BD
        $valores = [];
        
        foreach($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }
        
        // Consulta SQL
        $query = "UPDATE " . static::$tabla ." SET ";
        $query .=  join(', ', $valores );
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 "; 


        // Actualizar BD
        $resultado = self::$db->query($query);
        return $resultado;
    }

    // Todos los registros
    public static function all() {
        $query = "SELECT * FROM " . static::$tabla;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }
 
    
   
    // Devuelve todos los registro en orden descendente
    public static function all_ultimas() {
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY creada DESC ";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    // Busca un registro por su id
    public static function find($id) {
        $query = "SELECT * FROM " . static::$tabla  ." WHERE id = $id ";
        $resultado = self::consultarSQL($query);
        return array_shift( $resultado ) ;
    }

    // Busca un registro por su id
    public static function find_categoria($categoria) {
        $query = "SELECT categoria FROM " . static::$tabla ." WHERE categoria ='$categoria'";
        $resultado = self::consultarSQL($query);
        return array_shift( $resultado ) ;
    }

    // Busca un registro return
    public static function where($columna, $valor) {
        $query = "SELECT * FROM " . static::$tabla  ." WHERE $columna = '$valor'";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    // Busca un registro por array_shift
    public static function where_array($columna, $valor) {
        $query = "SELECT * FROM " . static::$tabla  ." WHERE $columna = '$valor'";
        $resultado = self::consultarSQL($query);
        return array_shift( $resultado ) ;
    }
   
    // Busca un registro por tabla, columna y valor
    public static function where_tabla_columna($tabla, $columna, $valor) {
        $query = "SELECT * FROM $tabla WHERE $columna = $valor";
        $resultado = self::consultarSQL($query);
        return array_shift( $resultado ) ;
    }

    // Busca registros por tabla
    public static function where_tabla($tabla) {
        $query = "SELECT * FROM  $tabla ";
        $resultado = self::consultarSQL($query);
        return $resultado;;
    }

    // Obtener Registros con cierta cantidad
    public static function get($limite) {
        $query = "SELECT * FROM " . static::$tabla . " LIMIT $limite";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    // Obtener Registros con cierta cantidad y de la tabla que elija
    public static function get_ultimas($limite, $columna) {
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY " . $columna . " DESC LIMIT $limite";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    // Obtener Registros con cierta cantidad y de la tabla que elija y aleatorio y limite 1
    public static function get_aleatorio($limite) {
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY RAND() DESC LIMIT $limite";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    // Eliminar un Registro por su ID
    public function eliminar() {
        $query = "DELETE FROM "  . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);
        return $resultado;
    }

    // Subir archivo de imagenes
    public function setImagen($imagen, $carpeta){
        // Eliminar la imagen previa
        if(!is_null($this->id)){
            $this->borrarImagen($carpeta);
        }
        // Agrega la imagen
        if($imagen){
            $this->imagen = $imagen;
        }
    }

    // Borrar archivos de imagen
    public function borrarImagen($carpeta){
        $exiteArchivo = file_exists($carpeta . $this->imagen);
        // Si existe lo elimina
        if($exiteArchivo){
            unlink($carpeta . $this->imagen);
        }
    }

    // Contar registros de una tabla
    public static function contar($tabla) {
        $query = " SELECT COUNT(*) FROM $tabla" ;
        $resultado = self::$db->query($query);
        return mysqli_fetch_assoc($resultado);
    }

}
