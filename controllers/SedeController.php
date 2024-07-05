<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Sede;
use MVC\Router;

class SedeController {

   public static function index(Router $router) {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      $pagina_actual = filter_var($_GET['page'], FILTER_VALIDATE_INT);

      if(!$pagina_actual || $pagina_actual < 1) {
         header('Location: /admin/asesores/sedes?page=1');
      }

      $por_pagina = 5;
      $total = Sede::total();

      $paginacion = new Paginacion($pagina_actual, $por_pagina, $total);
      $sedes = Sede::paginar($por_pagina, $paginacion->offet());
      

      $router->renderizar('admin/sede/index', [
         'titulo' => 'Lista de Sedes',
         'sedes' => $sedes,
         'paginacion' => $paginacion->paginacion()
      ]);
   }

   public static function crear(Router $router) {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      $alertas = [];
      $sede = new Sede;

      if($_SERVER['REQUEST_METHOD'] === 'POST') {

         if(!isAdmin()) {
            header('Location: /');
            return;
         }
         
         $sede->sincronizar($_POST);
         $alertas = $sede->validarSede();
         if(empty($alertas)) {
            $existeSede = Sede::where('nombre', $sede->nombre);
            if($existeSede) {
               Sede::setAlerta('error', 'La sede ya existe');
            } else {
               $resultado = $sede->guardar();
               if($resultado) {
                  header('Location: /admin/asesores/sedes');
               }
            }
         }
      }

      $alertas = Sede::getAlertas();
      $router->renderizar('admin/sede/crear', [
         'titulo' => 'Crear sede',
         'alertas' => $alertas,
         'sede' => $sede
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
         header('Location: /admin/asesores/sedes');
      }

      $sede = Sede::find($id);

      if($_SERVER['REQUEST_METHOD'] === 'POST') {
         $sede->sincronizar($_POST);
         $alertas = $sede->validarSede();
         if(empty($alertas)) {
            $resultado = $sede->guardar();
            if($resultado) {
               header('Location: /admin/asesores/sedes');
            }
         }
      }

      $router->renderizar('admin/sede/editar', [
         'titulo' => 'Actualizar Sede',
         'alertas' => $alertas,
         'sede' => $sede
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
         $sede = Sede::find($id);

         if(!isset($sede)) {
            header('Location: /admin/asesores/sedes');
         }

         $sede->estado = ($estado == '1') ? '0' : '1';
         $resultado = $sede->guardar();
         if($resultado) {
            header('Location: /admin/asesores/sedes');
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
         $sede = Sede::find($id);
         if(!isset($sede)) {
            header('Location: /admin/asesores/sedes');
         }
         $resultado = $sede->eliminar();
         if($resultado) {
            header('Location: /admin/asesores/sedes');
         }
      }

   }
}