<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Categoria;
use MVC\Router;

class CategoriaController {

   public static function index(Router $router) {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      $pagina_actual = filter_var($_GET['page'], FILTER_VALIDATE_INT);
      if(!$pagina_actual || $pagina_actual < 1) {
         header('Location: /admin/servicios/categorias?page=1');
      }

      $por_pagina = 5;
      $total = Categoria::total();

      $paginacion = new Paginacion($pagina_actual, $por_pagina, $total);
      $categorias = Categoria::paginar($por_pagina, $paginacion->offet());

      $router->renderizar('admin/categoria/index', [
         'titulo' => 'Lista de Categorias',
         'categorias' => $categorias,
         'paginacion' => $paginacion->paginacion()
      ]);
   }

   public static function crear(Router $router) {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      $alertas = [];
      $categoria = new Categoria;

      if($_SERVER['REQUEST_METHOD'] === 'POST') {
         
         if(!isAdmin()) {
            header('Location: /');
            return;
         }

         $categoria->sincronizar($_POST);
         $alertas = $categoria->validarCategoria();
         if(empty($alertas)) {
            $existeCategoria = Categoria::where('nombre', $categoria->nombre);
            if($existeCategoria) {
               Categoria::setAlerta('error', 'La categoría ya esta registrado');
            } else {
               $resultado = $categoria->guardar();
               if($resultado) {
                  header('Location: /admin/servicios/categorias');
               }
            }
         }
      }

      $alertas = Categoria::getAlertas();
      $router->renderizar('admin/categoria/crear', [
         'titulo' => 'Crear Categoría',
         'alertas' => $alertas,
         'categoria' => $categoria
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
         header('Location: /admin/servicios/categorias');
      }

      $categoria = Categoria::find($id);
      if(!$categoria) {
         header('Location: /admin/servicios/categorias');
      }

      if($_SERVER['REQUEST_METHOD'] === 'POST') {
         
         if(!isAdmin()) {
            header('Location: /');
            return;
         }

         $categoria->sincronizar($_POST);
         $alertas = $categoria->validar();
         if(empty($alertas)) {
            $resultado = $categoria->guardar();
            if($resultado) {
               header('Location: /admin/servicios/categorias');
            }
         }
      }

      $router->renderizar('admin/categoria/editar', [
         'titulo' => 'Actualizar Categoría',
         'alertas' => $alertas,
         'categoria' => $categoria
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

         $categoria = Categoria::find($id);

         if(!isset($categoria)) {
            header('Location: /admin/servicios/categorias');
         }

         $categoria->estado = ($estado == '1') ? '0' : '1';
         $resultado = $categoria->guardar();
         if($resultado) {
            header('Location: /admin/servicios/categorias');
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
         $categoria = Categoria::find($id);
         if(!isset($categoria)) {
            header('Location: /admin/servicios/categorias');
         }

         $resultado = $categoria->eliminar();
         if($resultado) {
            header('Location: /admin/servicios/categorias');
         }

      }
   }
   
}