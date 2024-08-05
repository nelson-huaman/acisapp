<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Cliente;
use Model\Grado;
use Model\Profesion;
use MVC\Router;

class ClienteController {

   public static function index(Router $router) {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      $pagina_actual = filter_var($_GET['page'], FILTER_VALIDATE_INT);

      if(!$pagina_actual || $pagina_actual < 1) {
         header('Location: /admin/clientes?page=1');
      }

      $por_pagina = 10;
      $total = Cliente::total();
      
      $paginacion = new Paginacion($pagina_actual, $por_pagina, $total);
      $clientes = Cliente::paginar($por_pagina, $paginacion->offet());
      foreach ($clientes as $cliente) {
         $cliente->prefesion = Profesion::find($cliente->idProfesion);
         $cliente->grado = Grado::find($cliente->idGrado);
      }
      
      $router->renderizar('admin/cliente/index', [
         'titulo' => 'Lista de Clientes',
         'clientes' => $clientes,
         'paginacion' => $paginacion->paginacion()
         
      ]);
   }

   public static function crear(Router $router) {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      $alertas = [];
      $cliente = new Cliente;
      $profesiones = Profesion::all();
      $grados = Grado::all();

      if($_SERVER['REQUEST_METHOD'] === 'POST') {

         $cliente->sincronizar($_POST);
         $alertas = $cliente->validarCliente();
         if(empty($alertas)) {
            $existeCliente = Cliente::whereArrayOR(['email' => $cliente->email, 'numeroDocumento' => $cliente->numeroDocumento]);
            if($existeCliente) {
               Cliente::setAlerta('error', 'El Cliente ya esta registrado, Correo o Cocumento son iguales');
            } else {
               $resultado = $cliente->guardar();
               if($resultado) {
                  header('Location: /admin/clientes');
               }
            }
         }
         
      }
      
      $alertas = Cliente::getAlertas();
      $router->renderizar('admin/cliente/crear', [
         'titulo' => 'Crear Cliente',
         'alertas' => $alertas,
         'cliente' => $cliente,
         'profesiones' => $profesiones,
         'grados' => $grados
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
         header('Location: /admin/clientes');
      }

      $profesiones = Profesion::all();
      $grados = Grado::all();
      $cliente = Cliente::find($id);

      if($_SERVER['REQUEST_METHOD'] === 'POST') {
         
         if(!isAdmin()) {
            header('Location: /');
            return;
         }

         $cliente->sincronizar($_POST);
         $alertas = $cliente->validar();
         if(empty($alertas)) {
            $resultado = $cliente->guardar();
            if($resultado) {
               header('Location: /admin/clientes');
            }
         }
      }

      $router->renderizar('admin/cliente/editar', [
         'titulo' => 'Actualizar Cliente',
         'alertas' => $alertas,
         'cliente' => $cliente,
         'profesiones' => $profesiones,
         'grados' => $grados
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
         $cliente = Cliente::find($id);
         $cliente->estado = ($estado == '1') ? '0' : '1';
         $resultado = $cliente->guardar();
         if($resultado) {
            header('Location: /admin/clientes');
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
         $cliente = Cliente::find($id);
         if(!isset($cliente)) {
            header('Location: /admin/clientes');
         }

         $resultado = $cliente->eliminar();
         if($resultado) {
            header('Location: /admin/clientes');
         }
      }
   }
}