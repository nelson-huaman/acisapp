<?php

namespace Controllers;

use MVC\Router;

class CategoriaController {

   public static function index(Router $router) {

      $router->renderizar('admin/categoria/index', [
         'titulo' => 'Lista de Categorias'
      ]);
   }

   public static function crear(Router $router) {

      $router->renderizar('admin/categoria/crear', [
         'titulo' => 'Crear Categoría'
      ]);
   }

   public static function editar(Router $router) {

      $router->renderizar('admin/categoria/editar', [
         'titulo' => 'Actualizar Categoría'
      ]);
   }

   public static function estado() {

   }

   public static function eliminar() {

   }
   
}