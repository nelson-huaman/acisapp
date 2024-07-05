<?php

namespace Controllers;

use MVC\Router;

class ServicioController {

   public static function index(Router $router) {

      $router->renderizar('admin/servicio/index', [
         'titulo' => 'Lista de Servicios'
      ]);
   }

   public static function crear(Router $router) {

      $router->renderizar('admin/servicio/crear', [
         'titulo' => 'Crear un Servicio'
      ]);
   }

   public static function editar(Router $router) {

      $router->renderizar('admin/servicio/editar', [
         'titulo' => 'Actualizar Servicios'
      ]);
   }

   public static function estado() {

   }

   public static function eliminar() {

   }

}