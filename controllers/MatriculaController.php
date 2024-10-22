<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Cliente;
use Model\ControlMatricula;
use Model\Matricula;
use Model\Operacion;
use Model\Servicio;
use Model\Usuario;
use MVC\Router;

class MatriculaController {

   public static function index(Router $router) {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      $pagina_actual = filter_var($_GET['page'], FILTER_VALIDATE_INT);
      if(!$pagina_actual || $pagina_actual < 1) {
         header('Location: /admin/matriculas?page=1');
      }

      $por_pagina = 10;
      $total = Matricula::total();

      $paginacion = new Paginacion($pagina_actual, $por_pagina, $total);
      $matriculas = Matricula::paginar($por_pagina, $paginacion->offet());

      foreach($matriculas as $matricula) {
         $matricula->asesor = Usuario::find($matricula->idUsuario);
         $matricula->cliente = Cliente::find($matricula->idCliente);
         $matricula->servicio = Servicio::find($matricula->idServicio);
      }

      $router->renderizar('admin/matricula/index', [
         'titulo' => 'Lista de Matrículas',
         'matriculas' => $matriculas,
         'paginacion' => $paginacion->paginacion()
      ]);
   }

   public static function crear(Router $router) {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      $router->renderizar('admin/matricula/matricula', [
         'titulo' => 'Registrar Matrícula'
      ]);
   }

   public static function editar(Router $router) {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      $router->renderizar('admin/matricula/editar', [
         'titulo' => 'Actualizar Matrícula'
      ]);
   }

   public static function estado() {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

   }

   public static function eliminar() {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }
   }

   public static function detalle(Router $router) {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      $router->renderizar('admin/matricula/detalle', [
         'titulo' => 'Detaller de la Matrícula'
      ]);
   }

   public static function incidencia(Router $router) {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      $pagina_actual = filter_var($_GET['page'], FILTER_VALIDATE_INT);
      if(!$pagina_actual || $pagina_actual < 1) {
         header('Location: /admin/matriculas/incidencia?page=1');
      }

      $por_pagina = 10;
      $total = ControlMatricula::total();

      $paginacion = new Paginacion($pagina_actual, $por_pagina, $total);
      $incidencias = ControlMatricula::paginar($por_pagina, $paginacion->offet());
      
      foreach($incidencias as $incidencia) {
         $incidencia->usuario = Usuario::find($incidencia->idUsuario);
         $incidencia->matricula = Matricula::find($incidencia->idMatricula);
         if ($incidencia->matricula) {
            $incidencia->servicio = Servicio::find($incidencia->matricula->idServicio);
            $incidencia->cliente = Cliente::find($incidencia->matricula->idCliente);
            $incidencia->operaciones = Operacion::whereID('idMatricula', $incidencia->idMatricula);
        }
      }

      $router->renderizar('admin/matricula/incidencia', [
         'titulo' => 'Lista de Incidencia',
         'incidencias' => $incidencias,
         'paginacion' => $paginacion->paginacion()
      ]);
   }

}