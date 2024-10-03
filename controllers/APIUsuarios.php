<?php

namespace Controllers;

use Model\Grado;
use Model\Cliente;
use Model\Profesion;

class APIUsuarios {

   public static function index() {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      $clientes = Cliente::all();
      foreach($clientes as $cliente) {
         $cliente->profesion = Profesion::find($cliente->idProfesion);
         $cliente->grado = Grado::find($cliente->idGrado);
      }
      echo json_encode($clientes);
   }

   public static function crear() {

      if($_SERVER['REQUEST_METHOD'] === 'POST') {

         if(!isAdmin()) {
            header('Location: /');
            return;
         }
         
         $cliente = new Cliente($_POST);

         // debuguear($cliente);
         $resultado = $cliente->guardar();
         // // $cliente->sincronizar();
         // // debuguear($cliente);
         // $resultado = $cliente->guardar();
         $respuesta = [
            'tipo' => 'exito',
            'id' => $resultado['id'],
            'mensaje' => 'Usuario creado correctamente'
         ];

         echo json_encode($respuesta);
      }
   }

}