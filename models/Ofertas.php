<?php

// Modelo Ofertas

namespace Model;

class Ofertas extends ActiveRecord {
    protected static $tabla = 'ofertas';
    protected static $columnasDB = ['id', 'imagen', 'titulo', 'descripcion', 'precio', 'valida', 'creada'];

    public $id;
    public $imagen;
    public $titulo;
    public $descripcion;
    public $precio;
    public $valida;
    public $creada;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->imagen = $args['imagen'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->valida = $args['valida'] ?? '';
        $this->creada = date('Y/m/d');
    }

}