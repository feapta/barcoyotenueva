<?php 

// Pagina public/index.php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AdminControllers;
use Controllers\ComentariosControllers;
use Controllers\ProductosControllers;
use Controllers\PaginasControllers;
use Controllers\UsuariosControllers;
use Controllers\CategoriasControllers;
use Controllers\OfertasControllers;

$router = new Router();

// Paginas
$router->get('/', [PaginasControllers::class, 'index']); 
$router->get('/contacto', [PaginasControllers::class, 'contacto']); 
$router->get('/nosotros', [PaginasControllers::class, 'nosotros']); 

// Registro de usuarios
$router->get('/login', [UsuariosControllers::class, 'login']);  
$router->post('/login', [UsuariosControllers::class, 'login']);  
$router->get('/usuarios/registro', [UsuariosControllers::class, 'registro']);   
$router->post('/usuarios/registro', [UsuariosControllers::class, 'registro']);  
$router->get('/usuarios/actualizar', [UsuariosControllers::class, 'actualizar']);  
$router->post('/usuarios/actualizar', [UsuariosControllers::class, 'actualizar']);  
$router->get('/olvidado', [UsuariosControllers::class, 'olvidado']);  
$router->post('/olvidado', [UsuariosControllers::class, 'olvidado']);  
$router->get('/listado', [UsuariosControllers::class, 'listado']);  
$router->get('/mensaje', [UsuariosControllers::class, 'mensaje']);  
$router->get('/confirmar', [UsuariosControllers::class, 'confirmar']);  
$router->get('/usuarios_registrados', [UsuariosControllers::class, 'usuarios_registrados']);  
$router->get('/logout', [UsuariosControllers::class, 'logout']);  

// Cartas
$router->get('/ofertas', [ProductosControllers::class, 'listar_ofertas']);   

$router->get('/carta_ofertas', [ProductosControllers::class, 'carta_ofertas']);   
$router->get('/carta_ofertas_post', [ProductosControllers::class, 'carta_ofertas_post']);   
$router->post('/carta_ofertas_post', [ProductosControllers::class, 'carta_ofertas_post']);   

$router->get('/carta_general', [ProductosControllers::class, 'listar']);    
$router->get('/cartas/listado', [ProductosControllers::class, 'listar_post']);
$router->post('/cartas/listado', [ProductosControllers::class, 'listar_post']);


// </Administracion> ////////////////////////////////////////////////////////////////
$router->get('/dashboard', [AdminControllers::class, 'dashboard']);  
$router->post('/admin/eliminar', [AdminControllers::class, 'eliminar']);

// Productos 
$router->get('/admin/carta_general', [ProductosControllers::class, 'listar_dash_carta_G']);     
$router->post('/admin/carta_general_P', [ProductosControllers::class, 'listar_dash_carta_G_P']);     
$router->get('/admin/carta_O_P', [ProductosControllers::class, 'listar_dash_carta_O']);     
$router->post('/admin/carta_O_P', [ProductosControllers::class, 'listar_dash_carta_O_P']);
$router->get('/admin/crear', [ProductosControllers::class, 'crear_producto']);
$router->post('/admin/crear', [ProductosControllers::class, 'crear_producto']);
$router->get('/admin/actualizar', [ProductosControllers::class, 'actualizar_producto']);
$router->post('/admin/actualizar', [ProductosControllers::class, 'actualizar_producto']);


// Ofertas
$router->get('/admin/ofertas', [OfertasControllers::class, 'listar_dash_O']);  
$router->post('/admin/ofertas_P', [OfertasControllers::class, 'listar_dash_O_P']); 
$router->get('/admin/crear_oferta', [OfertasControllers::class, 'crear_oferta']); 
$router->post('/admin/crear_oferta', [OfertasControllers::class, 'crear_oferta']); 
$router->get('/admin/actualizar_oferta', [OfertasControllers::class, 'actualizar_oferta']); 
$router->post('/admin/actualizar_oferta', [OfertasControllers::class, 'actualizar_oferta']); 


// Categorias
$router->get('/admin/categorias', [CategoriasControllers::class, 'listar']);   
$router->post('/admin/categorias_P', [CategoriasControllers::class, 'listar_P']);  
$router->get('/admin/categorias/crear', [CategoriasControllers::class, 'crear']);   
$router->post('/admin/categorias/crear', [CategoriasControllers::class, 'crear']);  
$router->get('/admin/categorias/actualizar', [CategoriasControllers::class, 'actualizar']);   
$router->post('/admin/categorias/actualizar', [CategoriasControllers::class, 'actualizar']);   



// Blog
$router->get('/admin/blog', [ComentariosControllers::class, 'listar']);  
$router->post('/admin/blog_P', [ComentariosControllers::class, 'listar_P']);  

$router->get('/blog', [ComentariosControllers::class, 'listado']);   
$router->get('/dejar', [ComentariosControllers::class, 'dejar']);   
$router->post('/dejar', [ComentariosControllers::class, 'dejar']);   

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();