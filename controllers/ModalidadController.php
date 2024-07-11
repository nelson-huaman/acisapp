<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Modalidad;
use MVC\Router;

class ModalidadController {

   public static function index(Router $router) {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      $pagina_actual = filter_var($_GET['page'], FILTER_VALIDATE_INT);
      if(!$pagina_actual || $pagina_actual < 1) {
         header('Location: /admin/servicios/modalidades?page=1');
      }

      $pox_pagina = 5;
      $total = Modalidad::total();

      $paginacion = new Paginacion($pagina_actual, $pox_pagina, $total);
      $modalidades = Modalidad::paginar($pox_pagina, $paginacion->offet());

      $router->renderizar('admin/modalidad/index', [
         'titulo' => 'Lista de Modalidades',
         'modalidades' => $modalidades,
         'paginacion' => $paginacion->paginacion()
      ]);
   }

   public static function crear(Router $router) {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      $alertas = [];
      $modalidad = new Modalidad;

      if($_SERVER['REQUEST_METHOD'] === 'POST') {

         if(!isAdmin()) {
            header('Location: /');
            return;
         }

         $modalidad->sincronizar($_POST);
         $alertas = $modalidad->validarModalidad();
         if(empty($alertas)) {
            $existeModalidad = Modalidad::where('nombre', $modalidad->nombre);
            if($existeModalidad) {
               Modalidad::setAlerta('error', 'La modalidad ya existe');
            } else {
               $resultado = $modalidad->guardar();
               if($resultado) {
                  header('Location: /admin/servicios/modalidades');
               }
            }
         }
         
      }

      $alertas = Modalidad::getAlertas();
      $router->renderizar('admin/modalidad/crear', [
         'titulo' => 'Crear Modalidad',
         'alertas' => $alertas,
         'modalidad' => $modalidad
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
         header('Location: /admin/servicios/modalidades');
      }

      $modalidad = Modalidad::find($id);
      if(!$modalidad) {
         header('Location: /admin/servicios/modalidades');
      }

      if($_SERVER['REQUEST_METHOD'] === 'POST') {
         
         if(!isAdmin()) {
            header('Location: /');
            return;
         }

         $modalidad->sincronizar($_POST);
         $alertas = $modalidad->validar();
         if(empty($alertas)) {
            $resultado = $modalidad->guardar();
            if($resultado) {
               header('Location: /admin/servicios/modalidades');
            }
         }

      }

      $router->renderizar('admin/modalidad/editar', [
         'titulo' => 'Actualizar Modalidad',
         'alertas' => $alertas,
         'modalidad' => $modalidad
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

         $modalidad = Modalidad::find($id);

         if(!isset($modalidad)) {
            header('Location: /admin/servicios/modalidades');
         }

         $modalidad->estado = ($estado == '1') ? '0' : '1';
         $resultado = $modalidad->guardar();
         if($resultado) {
            header('Location: /admin/servicios/modalidades');
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
         $modalidad = Modalidad::find($id);
         if(!isset($modalidad)) {
            header('Location: /admin/servicios/modalidades');
         }

         $resultado = $modalidad->eliminar();
         if($resultado) {
            header('Location: /admin/servicios/modalidades');
         }

      }

   }
   
}