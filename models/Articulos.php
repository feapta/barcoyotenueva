<?php

// Articulos

namespace Model;

class Articulos extends ActiveRecord{
    protected static $tabla = 'articulos';
    protected static $columnasDB = ['id', 'titulo', 'parrafo', 'imagen', 'creada'];

    public $id;
    public $titulo;
    public $parrafo;
    public $imagen;
    public $creada;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? null;
        $this->parrafo = $args['parrafo'] ?? null;
        $this->imagen = $args['imagen'] ?? null;
        $this->creada = date('Y/m/d');
    }
}

?>