<?php

namespace Model;

class Comen_user extends ActiveRecord{
    protected static $tabla = 'comentarios';
    protected static $columnasDB = ['id','nombre', 'imagen_comen', 'titulo', 'texto', 'estrellas', 'creada', 'imagen_user'];

    public $id;
    public $nombre;
    public $imagen;
    public $titulo;
    public $texto;
    public $estrellas;
    public $creada;
    public $imagen_user;


    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->texto = $args['texto'] ?? '';
        $this->estrellas = $args['estrellas'] ?? 0;
        $this->creada = date('Y/m/d');
        $this->imagen_user = $args['imagen_user'] ?? 0;
    }

}

//SELECT comentarios.id, comentarios.nombre, comentarios.imagen, comentarios.titulo, comentarios.texto, 
 //         comentarios.estrellas, comentarios.creada, usuarios.imagen as imagen_user 
 //         FROM comentarios LEFT OUTER JOIN usuarios ON comentarios.id_usuario = usuarios.id
?>

