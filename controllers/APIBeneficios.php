<?php

namespace Controllers;

use Model\Beneficio;

class APIBeneficios {
   public static function lista() {
      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      $beneficios = Beneficio::all();
      echo json_encode($beneficios);
   }
}