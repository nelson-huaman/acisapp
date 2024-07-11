<?php

namespace Controllers;

use MVC\Router;

class ProfesionController {

   public static function index(Router $router) {

      $router->renderizar('admin/profesion/index', [
         'titulo' => 'Lista de Profesiones'
      ]);
   }
}