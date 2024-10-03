<?php

namespace Controllers;

use Model\Grado;

class APIGrados {
   
   public static function index() {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      $grados = Grado::all('ASC', 1);
      echo json_encode($grados);
   }
}