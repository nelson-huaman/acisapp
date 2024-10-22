<?php

namespace Controllers;

use Model\Cliente;

class APIClientes {

   public static function index() {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      $clientes = Cliente::all();
      echo json_encode($clientes);
   }

   public static function cliente() {

      if($_SERVER['REQUEST_METHOD'] === 'POST') {

         if(!isAdmin()) {
            header('Location: /');
            return;
         }

         $cliente = new Cliente($_POST);
         $resultado = $cliente->guardar();
         if($resultado) {
            $respuesta = [
               'tipo' => 'exito',
               'id' => $cliente->id
            ]; 
   
            echo json_encode($respuesta);
         }
      }
   }

}