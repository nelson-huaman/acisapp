<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Categoria;
use Model\Modalidad;
use Model\Servicio;
use MVC\Router;

class ServicioController {

   public static function index(Router $router) {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      $pagigin_actual = filter_var($_GET['page'],  FILTER_VALIDATE_INT);
      if(!$pagigin_actual || $pagigin_actual < 1) {
         header('Location: /admin/servicios?page=1');
      }

      $por_pagina = 20;
      $total = Servicio::total();

      $paginacion = new Paginacion($pagigin_actual, $por_pagina, $total);
      $servicios = Servicio::paginar($por_pagina, $paginacion->offet());

      foreach($servicios as $servicio) {
         $servicio->categoria = Categoria::find($servicio->idCategoria);
         $servicio->modalidad = Modalidad::find($servicio->idModalidad);
      }

      $router->renderizar('admin/servicio/index', [
         'titulo' => 'Lista de Servicios',
         'servicios' => $servicios,
         'paginacion' => $paginacion->paginacion()
      ]);
   }

   public static function crear(Router $router) {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      $alertas = [];
      $categorias = Categoria::all();
      $modalidades = Modalidad::all();

      $servicio = new Servicio;

      if($_SERVER['REQUEST_METHOD'] === 'POST') {
         
         if(!isAdmin()) {
            header('Location: /');
            return;
         }

         $servicio->sincronizar($_POST);
         $alertas = $servicio->validarServicio();
         if(empty($alertas)) {
            $existeCodigo = Servicio::where('codigo', $servicio->codigo);
            if($existeCodigo) {
               Servicio::setAlerta('error', 'El código ya esta registrado');
            } else {
               $resultado = $servicio->guardar();
               if($resultado) {
                  header('Location: /admin/servicios');
               }
            }
         }

      }

      $alertas = Servicio::getAlertas();
      $router->renderizar('admin/servicio/crear', [
         'titulo' => 'Crear un Servicio',
         'alertas' => $alertas,
         'categorias' => $categorias,
         'modalidades' => $modalidades,
         'servicio' => $servicio
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
         header('Location: /admin/servicios');
      }

      $categorias = Categoria::all();
      $modalidades = Modalidad::all();

      $servicio = Servicio::find($id);

      if($_SERVER['REQUEST_METHOD'] === 'POST') {
         
         if(!isAdmin()) {
            header('Location: /');
            return;
         }

         $servicio->sincronizar($_POST);
         $alertas = $servicio->validar();
         if(empty($alertas)) {
            $resultado = $servicio->guardar();
            if($resultado) {
               header('Location: /admin/servicios');
            }
         }

      }


      $router->renderizar('admin/servicio/editar', [
         'titulo' => 'Actualizar Servicios',
         'alertas' => $alertas,
         'categorias' => $categorias,
         'modalidades' => $modalidades,
         'servicio' => $servicio
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
         $servicio = Servicio::find($id);

         if(!isset($servicio)) {
            header('Location: /admin/servicios');
         }

         $servicio->estado = ($estado == '1') ? '0' : '1';
         $resultado = $servicio->guardar();
         if($resultado) {
            header('Location: /admin/servicios');
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
         $servicio = Servicio::find($id);
         if(!isset($servicio)) {
            header('Location: /admin/servicios');
         }
         $resultado = $servicio->eliminar();
         if($resultado) {
            header('Location: /admin/servicios');
         }
      }

   }

}