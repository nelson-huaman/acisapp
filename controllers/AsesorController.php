<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Rol;
use Model\Sede;
use Model\Usuario;
use MVC\Router;

class AsesorController {

   public static function index(Router $router) {

      $pagina_actual = $_GET['page'];
      $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

      if(!$pagina_actual || $pagina_actual < 1) {
         header('Location: /admin/asesores?page=1');
      }

      $por_pagina = 5;
      $total = Usuario::total();

      $paginacion = new Paginacion($pagina_actual, $por_pagina, $total);
      $usuarios = Usuario::paginar($por_pagina, $paginacion->offet());

      foreach ($usuarios as $usuario) {
         $usuario->rol = Rol::find($usuario->rolId);
         $usuario->sede = Sede::find($usuario->sedeId);
      }

      $router->renderizar('admin/asesor/index', [
         'titulo' => 'Lista de Asesores',
         'usuarios' => $usuarios,
         'paginacion' => $paginacion->paginacion()
      ]);
   }

   public static function crear(Router $router) {

      $alertas = [];
      $roles = Rol::all('ASC');
      $sedes = Sede::all('ASC');

      $usuario = new Usuario;

      if($_SERVER['REQUEST_METHOD'] === 'POST') {
         
         $usuario->sincronizar($_POST);
         $alertas = $usuario->validarUsuario();
         if(empty($alertas)) {
            $existeUsuario = Usuario::whereArrayOR(['email' => $usuario->email, 'dni' => $usuario->dni]);
            if($existeUsuario) {
               Usuario::setAlerta('error', 'El asesor ya esta registrado o el nombre de usuario ya existe');
            } else {
               $usuario->crearToken();
               $usuario->username = str_replace(' ', '', $usuario->nombre) . $usuario->dni;
               $resultado = $usuario->guardar();
               if($resultado) {
                  header('Location: /admin/asesores');
               }
            }
         }
      }

      $alertas = Usuario::getAlertas();
      $router->renderizar('admin/asesor/crear', [
         'titulo' => 'Crear Asesor',
         'alertas' => $alertas,
         'roles' => $roles,
         'sedes' => $sedes,
         'usuario' => $usuario
      ]);
   }

   public static function editar(Router $router) {

      $alertas = [];

      $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
      
      if(!$id) {
         header('Location: /admin/asesores');
      }

      $roles = Rol::all('ASC');
      $sedes = Sede::all('ASC');

      $usuario = Usuario::find($id);

      if(!$usuario) {
         header('Location: /admin/asesores');
      }


      if($_SERVER['REQUEST_METHOD'] === 'POST') {

         $usuario->sincronizar($_POST);
         $alertas = $usuario->validar();
         if(empty($alertas)) {
            $resultado = $usuario->guardar();
            if($resultado) {
               header('Location: /admin/asesores');
            }
         }
      }

      $router->renderizar('admin/asesor/editar', [
         'titulo' => 'Editar Asesor',
         'alertas' => $alertas,
         'roles' => $roles,
         'sedes' => $sedes,
         'usuario' => $usuario
      ]);
   }

   public static function estado() {

      if($_SERVER['REQUEST_METHOD'] === 'POST') {
         $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);

         $usuario = Usuario::find($id);

         if(!isset($usuario)) {
            header('Location: /admin/asesores');
         }
         
         $usuario->estado = 0;

         $resultado = $usuario->guardar();
         if($resultado) {
            header('Location: /admin/asesores');
         }
      }

   }
}