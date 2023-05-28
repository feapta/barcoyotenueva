<?php

// Modelo menus

namespace Model;

class Menus extends ActiveRecord {
    protected static $tabla = 'productos';
    protected static $columnasDB = ['id', 'imagen','nombre', 'descripcion', 'precio', 'creada'];

    public $id;
    public $imagen;
    public $nombre;
    public $descripcion;
    public $precio;
    public $creada;


    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->imagen = $args['imagen'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->precio = $args['precio'] ?? 0;
        $this->creada = date('Y/m/d');
    }

}