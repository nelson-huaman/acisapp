<?php

namespace Model;

class Modalidad extends ActiveRecord {

   protected static $tabla = 'modalidad';
   protected static $columnasDB = ['id', 'nombre', 'estado'];

   public $id;
   public $nombre;
   public $estado;

   public function __construct($args = []) {
      $this->id = $args['id'] ?? null;
      $this->nombre = $args['nombre'] ?? '';
      $this->estado = $args['estado'] ?? 1;
   }

   public function validarModalidad() : array {
      if(!$this->nombre) {
         self::$alertas['error'][] = 'El nombre es obligatorio';
      }

      return self::$alertas;
   }

}