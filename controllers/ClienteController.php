<?php

namespace Controllers;

use MVC\Router;

class ClienteController {

   public static function index(Router $router) {

      $router->renderizar('admin/cliente/index', [
         'titulo' => 'Lista de Clientes'
      ]);
   }
}