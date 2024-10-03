<?php

namespace Model;

class Servicio extends ActiveRecord {

   protected static $tabla = 'servicio';
   protected static $columnasDB = ['id', 'idCategoria', 'nombre', 'codigo', 'estado'];

   public $id;
   public $idCategoria;
   public $nombre;
   public $codigo;
   public $estado;

   public function __construct($args = []) {
      $this->id = $args['id'] ?? null;
      $this->idCategoria = $args['idCategoria'] ?? '';
      $this->nombre = $args['nombre'] ?? '';
      $this->codigo = $args['codigo'] ?? '';
      $this->estado = $args['estado'] ?? 1;
   }

   public function validarServicio() : array {

      if(!$this->idCategoria) {
         self::$alertas['error'][] = 'La Categoría es obligatorio';
      }

      if(!$this->nombre) {
         self::$alertas['error'][] = 'El nombre es obligatorio';
      }

      if(!$this->codigo) {
         self::$alertas['error'][] = 'El codigo es obligatorio';
      }

      return self::$alertas;
   }

}