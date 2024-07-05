<?php

namespace Model;

class Promocion extends ActiveRecord {

   protected static $tabla = 'promocion';
   protected static $columnasDB = ['id', 'nombre', 'descripcion', 'estado'];

   public $id;
   public $nombre;
   public $descripcion;
   public $estado;

}