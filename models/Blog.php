<?php

// Modelo Calificaciones

namespace Model;

class Blog extends ActiveRecord {
    protected static $tabla = 'blog';
    protected static $columnasDB = ['id','nombre', 'imagen', 'titulo', 'texto', 'estrellas', 'creada'];

    public $id;
    public $nombre;
    public $imagen;
    public $titulo;
    public $texto;
    public $estrellas;
    public $creada;


    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->texto = $args['texto'] ?? '';
        $this->estrellas = $args['estrellas'] ?? 0;
        $this->creada = date('Y/m/d');
    }

}