<?php

namespace Model;

class Modalidad extends ActiveRecord {

   protected static $tabla = 'modalidad';
   protected static $columnasDB = ['id', 'nombre', 'estado'];

   public $id;
   public $nombre;
   public $estado;

}