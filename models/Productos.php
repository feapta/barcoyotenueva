<?php

// Modelo Productos

namespace Model;

class Productos extends ActiveRecord {
    protected static $tabla = 'productos';
    protected static $columnasDB = ['id','categoria', 'oferta', 'titulo', 'descripcion', 'media', 'precio', 'precio_ofer', 'precio_med', 'imagen', 'creada'];

    public $id;
    public $categoria;
    public $oferta;
    public $titulo;
    public $descripcion;
    public $media;
    public $precio;
    public $precio_ofer;
    public $precio_med;
    public $imagen;
    public $creada;


    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->categoria = $args['categoria'] ?? '';
        $this->oferta = $args['oferta'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->media = $args['media'] ?? '';
        $this->precio = $args['precio'] ?? 0;
        $this->precio_ofer = $args['precio_ofer'] ?? 0;
        $this->precio_med = $args['precio_ofer'] ?? 0;
        $this->imagen = $args['imagen'] ?? '';
        $this->creada = date('Y/m/d');
    }

}