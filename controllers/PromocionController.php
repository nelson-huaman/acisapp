<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Promocion;
use MVC\Router;

class PromocionController {

   public static function index(Router $router) {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      $pagina_actual = filter_var($_GET['page'], FILTER_VALIDATE_INT);
      if(!$pagina_actual || $pagina_actual < 1) {
         header('Location: /admin/servicios/promociones?page=1');
      }

      $por_pagina = 5;
      $total = Promocion::total();

      $paginacion = new Paginacion($pagina_actual, $por_pagina, $total);
      $promociones = Promocion::paginar($por_pagina, $paginacion->offet());

      $router->renderizar('admin/promocion/index', [
         'titulo' => 'Lista de Promociones',
         'promociones' => $promociones,
         'paginacion' => $paginacion->paginacion()
      ]);
   }

   public static function crear(Router $router) {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      $alertas = [];
      $promocion = new Promocion;

      if($_SERVER['REQUEST_METHOD'] === 'POST') {
         
         if(!isAdmin()) {
            header('Location: /');
            return;
         }

         $promocion->sincronizar($_POST);
         $alertas = $promocion->validarPromocion();
         if(empty($alertas)) {
            $existePromocion = Promocion::where('nombre', $promocion->nombre);
            if($existePromocion) {
               Promocion::setAlerta('error', 'La promoción ya esta registrado');
            } else {
               $resultado = $promocion->guardar();
               if($resultado) {
                  header('Location: /admin/servicios/promociones');
               }
            }
         }
      }

      $alertas = Promocion::getAlertas();
      $router->renderizar('admin/promocion/crear', [
         'titulo' => 'Crear Promoción',
         'alertas' => $alertas,
         'promocion' => $promocion
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
         header('Location: /admin/servicios/promociones');
      }

      $promocion = Promocion::find($id);

      if($_SERVER['REQUEST_METHOD'] === 'POST') {
         
         if(!isAdmin()) {
            header('Location: /');
            return;
         }

         $promocion->sincronizar($_POST);
         $alertas = $promocion->validar();
         if(empty($alertas)) {
            $resultado = $promocion->guardar();
            if($resultado) {
               header('Location: /admin/servicios/promociones');
            }
         }

      }

      $router->renderizar('admin/promocion/editar', [
         'titulo' => 'Actualizar Promoción',
         'alertas' => $alertas,
         'promocion' => $promocion
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

         $promocion = Promocion::find($id);

         if(!isset($promocion)) {
            header('Location: /admin/servicios/promociones');
         }

         $promocion->estado = ($estado == '1') ? '0' : '1';
         $resultado = $promocion->guardar();
         if($resultado) {
            header('Location: /admin/servicios/promociones');
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
         $promocion = Promocion::find($id);

         if(!isset($promocion)) {
            header('Location: /admin/servicios/promociones');
         }

         $resultado = $promocion->eliminar();
         if($resultado) {
            header('Location: /admin/servicios/promociones');
         }

      }
   }
   
}