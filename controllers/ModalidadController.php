<?php

namespace Controllers;

use MVC\Router;

class ModalidadController {

   public static function index(Router $router) {

      $router->renderizar('admin/modalidad/index', [
         'titulo' => 'Lista de Modalidades'
      ]);
   }

   public static function crear(Router $router) {

      $router->renderizar('admin/modalidad/crear', [
         'titulo' => 'Crear Modalidad'
      ]);
   }

   public static function editar(Router $router) {

      $router->renderizar('admin/modalidad/editar', [
         'titulo' => 'Actualizar Modalidad'
      ]);
   }

   public static function estado() {

   }

   public static function eliminar() {

   }
   
}