<?php

// Modelo Categorias

namespace Model;

class Categorias extends ActiveRecord {
    protected static $tabla = 'categorias';
    protected static $columnasDB = ['id','categoria', 'imagen'];

    public $id;
    public $categoria;
    public $imagen;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->categoria = $args['categoria'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
    }

}