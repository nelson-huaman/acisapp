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
      foreach($matriculas as $matricula) {
         $matricula->usuario = Usuario::find($matricula->idUsuario);
         $matricula->cliente = Cliente::find($matricula->idCliente);
         $matricula->servicio = Servicio::find($matricula->idServicio);
         $matricula->modalidad = Modalidad::find($matricula->idModalidad);
         $matricula->fuente = Fuente::find($matricula->idFuente);
         $matricula->promocion = Promocion::find($matricula->idPromocion);
         $matricula->beneficio = Beneficio::find($matricula->idBeneficio);
         $matricula->accesoio = Accesorio::find($matricula->idAccesorio);
      }

      echo json_encode($matriculas);
      
   }
}