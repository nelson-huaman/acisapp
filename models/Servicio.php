<?php

namespace Model;

class Servicio extends ActiveRecord {

   protected static $tabla = 'servicio';
   protected static $columnasDB = ['id', 'nombre', 'codigo', 'categoriaId', 'modalidadId', 'estado'];

   public $id;
   public $nombre;
   public $codigo;
   public $categoriaId;
   public $modalidadId;
   public $estado;

}