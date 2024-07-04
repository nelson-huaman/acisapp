<?php

namespace Model;

class Sede extends ActiveRecord {

   protected static $tabla = 'sede';
   protected static $columnasDB = ['id', 'nombre', 'estado'];

   public $id;
   public $nombre;
   public $estado;

}