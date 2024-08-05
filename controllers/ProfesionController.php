<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Profesion;
use MVC\Router;

class ProfesionController {

   public static function index(Router $router) {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      $pagina_actual = filter_var($_GET['page'], FILTER_VALIDATE_INT);
      if(!$pagina_actual || $pagina_actual < 1) {
         header('Location: /admin/clientes/profesiones?page=1');
      }

      $por_pagina = 10;
      $total = Profesion::all();

      $paginacion = new Paginacion($pagina_actual, $por_pagina, $total);
      $profesiones = Profesion::paginar($por_pagina, $paginacion->offet());

      $router->renderizar('admin/profesion/index', [
         'titulo' => 'Lista de Profesiones',
         'profesiones' => $profesiones,
         'paginacion' => $paginacion->paginacion()
      ]);
   }

   public static function crear(Router $router) {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      $alertas = [];
      $profesion = new Profesion;

      if($_SERVER['REQUEST_METHOD'] === 'POST') {

         if(!isAdmin()) {
            header('Location: /');
            return;
         }
         
         $profesion->sincronizar($_POST);
         $alertas = $profesion->validarProfesion();
         if(empty($alertas)) {
            $existeProfesion = Profesion::where('profesion', $profesion->profesion);
            if($existeProfesion) {
               Profesion::setAlerta('error', 'La profesión ya existe');
            } else {
               $resultado = $profesion->guardar();
               if($resultado) {
                  header('Location: /admin/clientes/profesiones');
               }
            }
         }
      }

      $alertas = Profesion::getAlertas();
      $router->renderizar('admin/profesion/crear', [
         'titulo' => 'Crear de Profesión',
         'alertas' => $alertas,
         'profesion' => $profesion
      ]);
   }

   public static function editar(Router $router) {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      $alertas = [];
      $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
      if(!$id) {
         header('Location: /admin/clientes/profesiones');
      }

      $profesion = Profesion::find($id);
      if(!$profesion) {
         header('Location: /admin/clientes/profesiones');
      }

      if($_SERVER['REQUEST_METHOD'] === 'POST') {
         
         if(!isAdmin()) {
            header('Location: /');
            return;
         }

         $profesion->sincronizar($_POST);
         $alertas = $profesion->validar();
         if(empty($alertas)) {
            $resultado = $profesion->guardar();
            if($resultado) {
               header('Location: /admin/clientes/profesiones');
            }
         }
      }

      $router->renderizar('admin/profesion/editar', [
         'titulo' => 'Actulizar de Profesiones',
         'alertas' => $alertas,
         'profesion' => $profesion
      ]);
   }

   public static function estado() {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      if($_SERVER['REQUEST_METHOD'] === 'POST') {
         
         if(!isAdmin()) {
            header('Location: /');
            return;
         }

         $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
         $estado = filter_var($_POST['estado'], FILTER_VALIDATE_INT);

         $profesion = Profesion::find($id);
         $profesion->estado = ($estado == '1') ? '0' : '1';
         $resultado = $profesion->guardar();
         if($resultado) {
            header('Location: /admin/clientes/profesiones');
         }
      }
   }

   public static function eliminar() {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      if($_SERVER['REQUEST_METHOD'] === 'POST') {
         
         if(!isAdmin()) {
            header('Location: /');
            return;
         }

         $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
         $profesion = Profesion::find($id);
         if(!isset($profesion)) {
            header('Location: /admin/clientes/profesiones');
         }

         $resultado = $profesion->eliminar();
         if($resultado) {
            header('Location: /admin/clientes/profesiones');
         }

      }
   }
}