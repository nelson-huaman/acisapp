<?php

namespace Model;

class Profesion extends ActiveRecord {

   protected static $tabla = 'profesion';
   protected static $columnasDB = ['id', 'profesion', 'estado'];

   public $id;
   public $profesion;
   public $estado;

   public function __construct($args = []) {
      $this->id = $args['id'] ?? null;
      $this->profesion = $args['profesion'] ?? '';
      $this->estado = $args['estado'] ?? 1;
   }

   public function validarProfesion() : array {
      if(!$this->profesion) {
         self::$alertas['error'][] = 'La profesión es obligatorio';
      }

      return self::$alertas;
   }

}