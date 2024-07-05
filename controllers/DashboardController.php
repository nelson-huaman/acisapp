<?php

namespace Controllers;

use MVC\Router;

class DashboardController {

   public static function index(Router $router) {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      $router->renderizar('admin/dashboard/index', [
         'titulo' => 'Panel Administrativo'
      ]);

   }
}