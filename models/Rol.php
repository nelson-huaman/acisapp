<?php

namespace Model;

class Rol extends ActiveRecord {

   protected static $tabla = 'rol';
   protected static $columnasDB = ['id', 'nombre', 'estado'];

   public $id;
   public $nombre;
   public $estado;

}