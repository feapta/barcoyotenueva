<?php

// Modelo Calificaciones

namespace Model;

class Comentarios extends ActiveRecord {
    protected static $tabla = 'comentarios';
    protected static $columnasDB = ['id','nombre', 'imagen', 'titulo', 'texto', 'estrellas', 'regis', 'id_usuario', 'creada'];

    public $id;
    public $nombre;
    public $imagen;
    public $titulo;
    public $texto;
    public $estrellas;
    public $regis;
    public $id_usuario;
    public $creada;


    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->texto = $args['texto'] ?? '';
        $this->estrellas = $args['estrellas'] ?? 0;
        $this->regis = $args['regis'] ?? 0;
        $this->id_usuario = $args['id_usuario'] ?? 0;
        $this->creada = date('Y/m/d');
    }

}