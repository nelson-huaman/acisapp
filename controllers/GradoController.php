<?php

namespace Controllers;

use MVC\Router;

class GradoController {

   public static function index(Router $router) {

      $router->renderizar('admin/grado/index', [
         'titulo' => 'Lista de Grados Académicos'
      ]);
   }
}