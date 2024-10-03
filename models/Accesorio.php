<?php

namespace Model;

class Accesorio extends ActiveRecord {

   protected static $tabla = 'accesorio';
   protected static $columnasDB = ['id', 'nombre', 'estado'];

   public $id;
   public $nombre;
   public $estado;

   public function __construct($args = []) {
      $this->id = $args['id'] ?? null;
      $this->nombre = $args['nombre'] ?? '';
      $this->estado = $args['estado'] ?? 1;
   }
}