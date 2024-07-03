<?php

namespace MVC;

class Router {
   
   public array $getRoutes = [];
   public array $postRoutes = [];

   public function get($url, $funcion) {
      $this->getRoutes[$url] = $funcion;
   }

   public function post($url, $funcion) {
      $this->postRoutes[$url] = $funcion;
   }

   public function comprobarURL() {

      $currenURL = strtok($_SERVER['REQUEST_URI'], '?') ?? '/';
      $method = $_SERVER['REQUEST_METHOD'];

      if($method === 'GET') {
         $funcion = $this->getRoutes[$currenURL] ?? null;
      } else {
         $funcion = $this->postRoutes[$currenURL] ?? null;
      }

      if($funcion) {
         call_user_func($funcion, $this);
      } else {
         header('Location: /404');
      }

   }

   public function renderizar($view, $datos = []) {

      foreach ($datos as $key => $value) {
         $$key = $value;
      }

      ob_start();
      include_once __DIR__ . "/views/$view.php";
      $contenido = ob_get_clean();
      $currenURL = strtok($_SERVER['REQUEST_URI'], '?') ?? '/';

      if(str_contains($currenURL, '/admin')) {
         include_once __DIR__ . '/views/layout-admin.php';
      } else {
         include_once __DIR__ . '/views/layout.php';
      }

   }
}