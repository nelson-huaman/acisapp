<?php

namespace Model;

class Promocion extends ActiveRecord {

   protected static $tabla = 'promocion';
   protected static $columnasDB = ['id', 'nombre', 'descripcion', 'estado'];

   public $id;
   public $nombre;
   public $descripcion;
   public $estado;

   public function __construct($args = []) {
      $this->id = $args['id'] ?? null;
      $this->nombre = $args['nombre'] ?? '';
      $this->descripcion = $args['descripcion'] ?? '';
      $this->estado = $args['estado'] ?? 1;
   }

   public function validarPromocion() : array {
      if(!$this->nombre) {
         self::$alertas['error'][] = 'El nombre es obligatorio';
      }

      return self::$alertas;
   }

}