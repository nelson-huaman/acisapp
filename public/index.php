<?php

use Controllers\APIBeneficios;
use Controllers\APIGrados;
use Controllers\APIMatriculas;
use Controllers\APIProfesiones;
use Controllers\APIClientes;
use Controllers\APIServicios;
use Controllers\AsesorController;
use Controllers\CategoriaController;
use Controllers\ClienteController;
use Controllers\DashboardController;
use Controllers\GradoController;
use Controllers\LoginController;
use Controllers\MatriculaController;
use Controllers\ModalidadController;
use Controllers\ProfesionController;
use Controllers\PromocionController;
use Controllers\RolController;
use Controllers\SedeController;
use Controllers\ServicioController;
use MVC\Router;

require_once __DIR__ . '/../config/app.php';

$router = new Router;

// Login
$router->get('/', [LoginController::class, 'login']);
$router->post('/', [LoginController::class, 'login']);
$router->post('/logout', [LoginController::class, 'logout']);
$router->get('/confirmar', [LoginController::class, 'confirmar']);
$router->post('/confirmar', [LoginController::class, 'confirmar']);
$router->get('/olvide', [LoginController::class, 'olvide']);
$router->post('/olvide', [LoginController::class, 'olvide']);
$router->get('/restablecer', [LoginController::class, 'restablecer']);
$router->post('/restablecer', [LoginController::class, 'restablecer']);

// Admin
$router->get('/admin/dashboard', [DashboardController::class, 'index']);

// Asesor
$router->get('/admin/asesores', [AsesorController::class, 'index']);
$router->get('/admin/asesores/crear', [AsesorController::class, 'crear']);
$router->post('/admin/asesores/crear', [AsesorController::class, 'crear']);
$router->get('/admin/asesores/editar', [AsesorController::class, 'editar']);
$router->post('/admin/asesores/editar', [AsesorController::class, 'editar']);
$router->post('/admin/asesores/estado', [AsesorController::class, 'estado']);

$router->post('/admin/asesores/eliminar', [AsesorController::class, 'eliminar']);
$router->get('/admin/asesores/roles', [RolController::class, 'index']);
$router->get('/admin/asesores/roles/crear', [RolController::class, 'crear']);
$router->post('/admin/asesores/roles/crear', [RolController::class, 'crear']);
$router->get('/admin/asesores/roles/editar', [RolController::class, 'editar']);
$router->post('/admin/asesores/roles/editar', [RolController::class, 'editar']);
$router->post('/admin/asesores/roles/estado', [RolController::class, 'estado']);
$router->post('/admin/asesores/roles/eliminar', [RolController::class, 'eliminar']);

$router->get('/admin/asesores/sedes', [SedeController::class, 'index']);
$router->get('/admin/asesores/sedes/crear', [SedeController::class, 'crear']);
$router->post('/admin/asesores/sedes/crear', [SedeController::class, 'crear']);
$router->get('/admin/asesores/sedes/editar', [SedeController::class, 'editar']);
$router->post('/admin/asesores/sedes/editar', [SedeController::class, 'editar']);
$router->post('/admin/asesores/sedes/estado', [SedeController::class, 'estado']);
$router->post('/admin/asesores/sedes/eliminar', [SedeController::class, 'eliminar']);

// Servicio
$router->get('/admin/servicios', [ServicioController::class, 'index']);
$router->get('/admin/servicios/crear', [ServicioController::class, 'crear']);
$router->post('/admin/servicios/crear', [ServicioController::class, 'crear']);
$router->get('/admin/servicios/editar', [ServicioController::class, 'editar']);
$router->post('/admin/servicios/editar', [ServicioController::class, 'editar']);
$router->post('/admin/servicios/estado', [ServicioController::class, 'estado']);
$router->post('/admin/servicios/eliminar', [ServicioController::class, 'eliminar']);

$router->get('/admin/servicios/categorias', [CategoriaController::class, 'index']);
$router->get('/admin/servicios/categorias/crear', [CategoriaController::class, 'crear']);
$router->post('/admin/servicios/categorias/crear', [CategoriaController::class, 'crear']);
$router->get('/admin/servicios/categorias/editar', [CategoriaController::class, 'editar']);
$router->post('/admin/servicios/categorias/editar', [CategoriaController::class, 'editar']);
$router->post('/admin/servicios/categorias/estado', [CategoriaController::class, 'estado']);
$router->post('/admin/servicios/categorias/eliminar', [CategoriaController::class, 'eliminar']);

$router->get('/admin/servicios/modalidades', [ModalidadController::class, 'index']);
$router->get('/admin/servicios/modalidades/crear', [ModalidadController::class, 'crear']);
$router->post('/admin/servicios/modalidades/crear', [ModalidadController::class, 'crear']);
$router->get('/admin/servicios/modalidades/editar', [ModalidadController::class, 'editar']);
$router->post('/admin/servicios/modalidades/editar', [ModalidadController::class, 'editar']);
$router->post('/admin/servicios/modalidades/estado', [ModalidadController::class, 'estado']);
$router->post('/admin/servicios/modalidades/eliminar', [ModalidadController::class, 'eliminar']);

$router->get('/admin/servicios/promociones', [PromocionController::class, 'index']);
$router->get('/admin/servicios/promociones/crear', [PromocionController::class, 'crear']);
$router->post('/admin/servicios/promociones/crear', [PromocionController::class, 'crear']);
$router->get('/admin/servicios/promociones/editar', [PromocionController::class, 'editar']);
$router->post('/admin/servicios/promociones/editar', [PromocionController::class, 'editar']);
$router->post('/admin/servicios/promociones/estado', [PromocionController::class, 'estado']);
$router->post('/admin/servicios/promociones/eliminar', [PromocionController::class, 'eliminar']);

// Cliente
$router->get('/admin/clientes', [ClienteController::class, 'index']);
$router->get('/admin/clientes/crear', [ClienteController::class, 'crear']);
$router->post('/admin/clientes/crear', [ClienteController::class, 'crear']);
$router->get('/admin/clientes/editar', [ClienteController::class, 'editar']);
$router->post('/admin/clientes/editar', [ClienteController::class, 'editar']);
$router->post('/admin/clientes/estado', [ClienteController::class, 'estado']);
$router->post('/admin/clientes/eliminar', [ClienteController::class, 'eliminar']);

$router->get('/admin/clientes/profesiones', [ProfesionController::class, 'index']);
$router->get('/admin/clientes/profesiones/crear', [ProfesionController::class, 'crear']);
$router->post('/admin/clientes/profesiones/crear', [ProfesionController::class, 'crear']);
$router->get('/admin/clientes/profesiones/editar', [ProfesionController::class, 'editar']);
$router->post('/admin/clientes/profesiones/editar', [ProfesionController::class, 'editar']);
$router->post('/admin/clientes/profesiones/estado', [ProfesionController::class, 'estado']);
$router->post('/admin/clientes/profesiones/eliminar', [ProfesionController::class, 'eliminar']);

$router->get('/admin/clientes/grados', [GradoController::class, 'index']);
$router->get('/admin/clientes/grados/crear', [GradoController::class, 'crear']);
$router->post('/admin/clientes/grados/crear', [GradoController::class, 'crear']);
$router->get('/admin/clientes/grados/editar', [GradoController::class, 'editar']);
$router->post('/admin/clientes/grados/editar', [GradoController::class, 'editar']);
$router->post('/admin/clientes/grados/estado', [GradoController::class, 'estado']);
$router->post('/admin/clientes/grados/eliminar', [GradoController::class, 'eliminar']);

$router->get('/admin/matriculas', [MatriculaController::class, 'index']);
$router->get('/admin/matriculas/crear', [MatriculaController::class, 'crear']);
$router->post('/admin/matriculas/crear', [MatriculaController::class, 'crear']);
$router->get('/admin/matriculas/editar', [MatriculaController::class, 'editar']);
$router->post('/admin/matriculas/editar', [MatriculaController::class, 'editar']);
$router->post('/admin/matriculas/estado', [MatriculaController::class, 'estado']);
$router->post('/admin/matriculas/eliminar', [MatriculaController::class, 'eliminar']);
$router->get('/admin/matriculas/detalle', [MatriculaController::class, 'detalle']);
$router->get('/admin/matriculas/incidencia', [MatriculaController::class, 'incidencia']);


$router->get('/api/clientes', [APIClientes::class, 'index']);
$router->post('/api/cliente/crear', [APIClientes::class, 'crear']);
$router->post('/api/cliente/actualizar', [APIClientes::class, 'actualizar']);
$router->post('/api/cliente', [APIClientes::class, 'cliente']);
$router->get('/api/matriculas', [APIMatriculas::class, 'index']);
$router->get('/api/matricula', [APIMatriculas::class, 'matricula']);
$router->get('/api/profesiones', [APIProfesiones::class, 'index']);
$router->get('/api/grados', [APIGrados::class, 'index']);
$router->get('/api/servicios', [APIServicios::class, 'lista']);
$router->get('/api/beneficios', [APIBeneficios::class, 'lista']);


$router->comprobarURL();