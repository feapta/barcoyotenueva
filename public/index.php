<?php 

// Pagina public/index.php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AdminControllers;
use Controllers\BlogControllers;
use Controllers\ProductosControllers;
use Controllers\PaginasControllers;
use Controllers\UsuariosControllers;
use Controllers\CategoriasControllers;
use Controllers\OfertasControllers;
use Controllers\Usuarios_regisControllers;

$router = new Router();

// Paginas
$router->get('/', [PaginasControllers::class, 'index']); 
$router->get('/contacto', [PaginasControllers::class, 'contacto']); 
$router->get('/nosotros', [PaginasControllers::class, 'nosotros']); 

// Usuarios
$router->get('/login', [UsuariosControllers::class, 'login']);  
$router->post('/login', [UsuariosControllers::class, 'login']); 
$router->get('/listado', [UsuariosControllers::class, 'listado']);  
$router->get('/mensaje', [UsuariosControllers::class, 'mensaje']);  
$router->get('/confirmar', [UsuariosControllers::class, 'confirmar']);  
$router->get('/logout', [UsuariosControllers::class, 'logout']);  

$router->get('/usuarios/registro', [UsuariosControllers::class, 'registro']);   
$router->post('/usuarios/registro', [UsuariosControllers::class, 'registro']);  

$router->get('/usuarios/actualizar', [UsuariosControllers::class, 'actualizar']);  
$router->post('/usuarios/actualizar', [UsuariosControllers::class, 'actualizar']);

$router->get('/usuarios/cambiar_pass', [UsuariosControllers::class, 'cambiar_pass']);  
$router->post('/usuarios/cambiar_pass', [UsuariosControllers::class, 'cambiar_pass']);  

$router->get('/usuarios/olvidado', [UsuariosControllers::class, 'olvidado']);  
$router->post('/usuarios/olvidado', [UsuariosControllers::class, 'olvidado']); 

$router->get('/usuarios/recuperar', [UsuariosControllers::class, 'recuperar']);  
$router->post('/usuarios/recuperar', [UsuariosControllers::class, 'recuperar']);  

// Cartas
$router->get('/ofertas', [ProductosControllers::class, 'listar_ofertas']);   

$router->get('/carta_general', [ProductosControllers::class, 'listar']); 

$router->get('/cartas/listado', [ProductosControllers::class, 'listar_post']);
$router->post('/cartas/listado', [ProductosControllers::class, 'listar_post']);

// Menus
$router->get('/menus', [MenusControllers::class, 'menuslistar']); 

$router->get('/menus/listarDash', [MenusControllers::class, 'menusListarDash']);
$router->post('/menus/listarDash', [MenusControllers::class, 'menusListarDash_P']);

$router->get('/menus/crearDash', [MenusControllers::class, 'menusCrearDash']);
$router->post('/menus/crearDash', [MenusControllers::class, 'menusCrearDash']);

$router->get('/menus/actualizarDash', [MenusControllers::class, 'menusActualizarDash']);
$router->post('/menus/actualizarDash', [MenusControllers::class, 'menusActualizarDash']);

// Administracion   ////////////////////////////////////////////////////////////////

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
$router->get('/admin/blog', [BlogControllers::class, 'listarComentarios']);  
$router->post('/admin/blog_P', [BlogControllers::class, 'listarComentarios_P']);  
$router->get('/admin/articulos/listar', [BlogControllers::class, 'listarArticulo']);  
$router->post('/admin/articulos/listar', [BlogControllers::class, 'listarArticulo_P']);  
$router->get('/admin/articulos/crear', [BlogControllers::class, 'crearArticulo']);  
$router->post('/admin/articulos/crear', [BlogControllers::class, 'crearArticulo']);  
$router->get('/admin/articulos/actualizar', [BlogControllers::class, 'actualizarArticulo']);  
$router->post('/admin/articulos/actualizar', [BlogControllers::class, 'actualizarArticulo']);  

$router->get('/blog', [BlogControllers::class, 'blog']);   
$router->get('/dejar', [BlogControllers::class, 'dejar']);   
$router->post('/dejar', [BlogControllers::class, 'dejar']);   

// Datos de los usuarios
$router->get('/usuarios_registrados', [Usuarios_regisControllers::class, 'usuarios_registrados']);  
$router->post('/usuarios_registrados', [Usuarios_regisControllers::class, 'usuarios_registrados']); 

$router->get('/user/listado', [Usuarios_regisControllers::class, 'listar_user']);  
$router->post('/user/listado_P', [Usuarios_regisControllers::class, 'listar_user_P']); 

$router->get('/user/actualizar', [Usuarios_regisControllers::class, 'actualizar_user']); 
$router->post('/user/actualizar_P', [Usuarios_regisControllers::class, 'actualizar_user_P']); 

$router->get('/user/email', [Usuarios_regisControllers::class, 'email_user']);  
$router->post('/user/email_P', [Usuarios_regisControllers::class, 'email_user_P']); 
 
$router->post('/user/dejar', [Usuarios_regisControllers::class, 'dejar_user']);  

$router->post('/user/enviar_mail', [Usuarios_regisControllers::class, 'enviar_mail']);  

// ofertas para usuarios
$router->get('/user/ofertas', [Usuarios_regisControllers::class, 'listar_ofertas_user']);  
$router->post('/user/ofertas_P', [Usuarios_regisControllers::class, 'listar_ofertas_user_P']);

$router->get('/user/crearOfertas', [Usuarios_regisControllers::class, 'userCrearOfertas']);  
$router->post('/user/crearOfertas', [Usuarios_regisControllers::class, 'userCrearOfertas']); 

$router->get('/user/actualizarOferta', [Usuarios_regisControllers::class, 'userActualizarOferta']); 
$router->post('/user/actualizarOferta', [Usuarios_regisControllers::class, 'userActualizarOferta']); 


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();