<?php

namespace Controllers;

use MVC\Router;

class AsesorController {

   public static function index(Router $router) {

      $router->renderizar('admin/asesor/index', [
         'titulo' => 'Lista de Asesores'
      ]);
   }

   public static function crear(Router $router) {

      $router->renderizar('admin/asesor/index', [
         'titulo' => 'Crear Asesor'
      ]);
   }

   public static function editar(Router $router) {

      $router->renderizar('admin/asesor/index', [
         'titulo' => 'Editar Asesor'
      ]);
   }
}