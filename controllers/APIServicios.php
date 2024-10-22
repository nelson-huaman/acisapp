<?php

namespace Controllers;

use Model\Servicio;

class APIServicios {
   public static function lista() {

      if(!isAdmin()) {
         header('Location: /');
         return;
      }

      $servicios = Servicio::all();

      echo json_encode($servicios);

   }
}