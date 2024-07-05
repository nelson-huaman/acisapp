<?php

namespace Controllers;

use MVC\Router;

class PromocionController {

   public static function index(Router $router) {

      $router->renderizar('admin/promocion/index', [
         'titulo' => 'Lista de Promociones'
      ]);
   }

   public static function crear(Router $router) {

      $router->renderizar('admin/promocion/crear', [
         'titulo' => 'Crear Promoción'
      ]);
   }

   public static function editar(Router $router) {

      $router->renderizar('admin/promocion/editar', [
         'titulo' => 'Actualizar Promoción'
      ]);
   }

   public static function estado() {

   }

   public static function eliminar() {

   }
   
}