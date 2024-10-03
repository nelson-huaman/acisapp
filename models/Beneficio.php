<?php

namespace Model;

class Beneficio extends ActiveRecord {

   protected static $tabla = 'beneficio';
   protected static $columnasDB = ['id', 'tipoBeneficio', 'estado'];

   public $id;
   public $tipoBeneficio;
   public $estado;

   public function __construct($args = []) {
      $this->id = $args['id'] ?? null;
      $this->tipoBeneficio = $args['tipoBeneficio'] ?? '';
      $this->estado = $args['estado'] ?? 1;
   }
}