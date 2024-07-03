<?php

use Controllers\AsesorController;
use Controllers\DashboardController;
use Controllers\LoginController;
use MVC\Router;

require_once __DIR__ . '/../config/app.php';

$router = new Router;

// Login
$router->get('/', [LoginController::class, 'login']);
$router->post('/', [LoginController::class, 'login']);

// Admin
$router->get('/admin/dashboard', [DashboardController::class, 'index']);

$router->get('/admin/asesores/index', [AsesorController::class, 'index']);
$router->get('/admin/asesores/crear', [AsesorController::class, 'crear']);
$router->post('/admin/asesores/crear', [AsesorController::class, 'crear']);
$router->get('/admin/asesores/editar', [AsesorController::class, 'editar']);
$router->post('/admin/asesores/editar', [AsesorController::class, 'editar']);
$router->post('/admin/asesores/estado', [AsesorController::class, 'estado']);
$router->post('/admin/asesores/eliminar', [AsesorController::class, 'eliminar']);

$router->comprobarURL();