<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Grado;
use MVC\Router;

class GradoController {

   public static function index(Router $router) {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      $pagina_actual = filter_var($_GET['page'], FILTER_VALIDATE_INT);

      if(!$pagina_actual || $pagina_actual < 1) {
         header('Location: /admin/clientes/grados?page=1');
      }

      $por_pagina = 10;
      $total = Grado::all();

      $paginacion = new Paginacion($pagina_actual, $por_pagina, $total);
      $grados = Grado::paginar($por_pagina, $paginacion->offet());

      $router->renderizar('admin/grado/index', [
         'titulo' => 'Lista de Grados Académicos',
         'grados' => $grados,
         'paginacion' => $paginacion->paginacion()
      ]);
   }

   public static function crear(Router $router) {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      $alertas = [];
      $grado = new Grado;

      if($_SERVER['REQUEST_METHOD'] === 'POST') {

         if(!isAdmin()) {
            header('Location: /');
            return;
         }

         $grado->sincronizar($_POST);
         $alertas = $grado->validarGrado();
         if(empty($alertas)) {
            $existeGrado = Grado::where('gradoAcademico', $grado->gradoAcademico);
            if($existeGrado) {
               Grado::setAlerta('error', 'El grado académico ya existe');
            } else {
               $resultado = $grado->guardar();
               if($resultado) {
                  header('Location: /admin/clientes/grados');
               }
            }
         }
      }

      $alertas = Grado::getAlertas();
      $router->renderizar('admin/grado/crear', [
         'titulo' => 'Crear Grado Académico',
         'alertas' => $alertas
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
         header('Location: /admin/clientes/grados');
      }

      $grado = Grado::find($id);

      if($_SERVER['REQUEST_METHOD'] === 'POST') {
         
         if(!isAdmin()) {
            header('Location: /');
            return;
         }

         $grado->sincronizar($_POST);
         $alertas = $grado->validar();
         if(empty($alertas)) {
            $resultado = $grado->guardar();
            if($resultado) {
               header('Location: /admin/clientes/grados');
            }
         }
      }
      
      $router->renderizar('admin/grado/editar', [
         'titulo' => 'Actualizar Grado Académico',
         'alertas' => $alertas,
         'grado' => $grado
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
         $grado = Grado::find($id);
         $grado->estado = ($estado == '1') ? '0' : '1';
         $resultado = $grado->guardar();
         if($resultado) {
            header('Location: /admin/clientes/grados');
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
         $grado = Grado::find($id);
         if(!isset($grado)) {
            header('Location: /admin/clientes/grados');
         }

         $resultado = $grado->eliminar();
         if($resultado) {
            header('Location: /admin/clientes/grados');
         }
      }
   }
}