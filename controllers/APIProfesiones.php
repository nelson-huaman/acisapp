<?php

namespace Controllers;

use Model\Profesion;

class APIProfesiones {

   public static function index() {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      // $profesiones = Profesion::where('estado', '1');

      $profesiones = Profesion::all('ASC', 1);
      echo json_encode($profesiones);
   }
}