<?php

namespace Controllers;

use Model\Accesorio;
use Model\Beneficio;
use Model\Cliente;
use Model\Fuente;
use Model\Matricula;
use Model\Modalidad;
use Model\Promocion;
use Model\Servicio;
use Model\Usuario;

class APIMatriculas {

   public static function index() {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      $matriculas = Matricula::all();
      echo json_encode($matriculas);
      
   }

   public static function matricula() {
      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      $token = filter_var($_GET['token'], FILTER_VALIDATE_INT);
      if(!$token || $token < 1) {
         header('Location: /admin/dashboard');
      }


      // $matricula = Matricula::find($token);
      $matriculas = Matricula::whereID('idCliente', $token);

      echo json_encode($matriculas);
   }


}