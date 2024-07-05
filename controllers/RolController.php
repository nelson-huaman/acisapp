<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Rol;
use MVC\Router;

class RolController {

   public static function index(Router $router) {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      $pagina_actual = $_GET['page'];
      $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

      if(!$pagina_actual || $pagina_actual < 1) {
         header('Location: /admin/asesores/roles?page=1');
      }

      $por_pagina = 5;
      $total = Rol::total();

      $paginacion = new Paginacion($pagina_actual, $por_pagina, $total);
      $roles = Rol::paginar($por_pagina, $paginacion->offet());

      $router->renderizar('admin/rol/index',[
         'titulo' => 'Lista de Roles',
         'roles' => $roles,
         'paginacion' => $paginacion->paginacion()
      ]);
   }

   public static function crear(Router $router) {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      $alertas = [];
      $rol = new Rol;

      if($_SERVER['REQUEST_METHOD'] === 'POST') {
         
         if(!isAdmin()) {
            header('Location: /');
            return;
         }

         $rol->sincronizar($_POST);
         $alertas = $rol->validarRol();
         if(empty($alertas)) {
            $existeRol = Rol::where('nombre', $rol->nombre);
            if($existeRol) {
               Rol::setAlerta('error', 'El rol  ya existe');
            } else {
               $resultado = $rol->guardar();
               if($resultado) {
                  header('Location: /admin/asesores/roles');
               }
            }
         }
      }

      $alertas = Rol::getAlertas();
      $router->renderizar('admin/rol/crear',[
         'titulo' => 'Crear un Rol',
         'alertas' => $alertas,
         'rol' => $rol
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
         header('Location: /admin/asesores/roles');
      }

      $rol = Rol::find($id);
      if(!$rol) {
         header('Location: /admin/asesores/roles');
      }

      if($_SERVER['REQUEST_METHOD'] === 'POST') {

         if(!isAdmin()) {
            header('Location: /');
            return;
         }

         $rol->sincronizar($_POST);
         $alertas = $rol->validar();
         if(empty($alertas)) {

            // debuguear($rol);
            $resultado = $rol->guardar();
            if($resultado) {
               header('Location: /admin/asesores/roles');
            }
         }
      }

      $router->renderizar('admin/rol/editar',[
         'titulo' => 'Actualizar un Rol',
         'alertas' => $alertas,
         'rol' => $rol
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
         $rol = Rol::find($id);

         if(!isset($rol)) {
            header('Location: /admin/asesores/roles');
         }

         $rol->estado = ($estado == '1') ? '0' : '1';
         $resultado = $rol->guardar();
         if($resultado) {
            header('Location: /admin/asesores/roles');
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
         $rol = Rol::find($id);
         if(!isset($rol)) {
            header('Location: /admin/asesores/roles');
         }
         $resultado = $rol->eliminar();
         if($resultado) {
            header('Location: /admin/asesores/roles');
         }

      }
   }
}