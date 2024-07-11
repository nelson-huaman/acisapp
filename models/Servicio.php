<?php

namespace Model;

class Servicio extends ActiveRecord {

   protected static $tabla = 'servicio';
   protected static $columnasDB = ['id', 'nombre', 'codigo', 'idCategoria', 'idModalidad', 'estado'];

   public $id;
   public $nombre;
   public $codigo;
   public $idCategoria;
   public $idModalidad;
   public $estado;

   public function __construct($args = []) {
      $this->id = $args['id'] ?? null;
      $this->nombre = $args['nombre'] ?? '';
      $this->codigo = $args['codigo'] ?? '';
      $this->idCategoria = $args['idCategoria'] ?? '';
      $this->idModalidad = $args['idModalidad'] ?? '';
      $this->estado = $args['estado'] ?? 1;
   }

   public function validarServicio() : array {
      if(!$this->nombre) {
         self::$alertas['error'][] = 'El nombre es obligatorio';
      }

      if(!$this->codigo) {
         self::$alertas['error'][] = 'El codigo es obligatorio';
      }

      if(!$this->idCategoria) {
         self::$alertas['error'][] = 'La Categoría es obligatorio';
      }

      if(!$this->idModalidad) {
         self::$alertas['error'][] = 'La Modalidad es obligatorio';
      }

      return self::$alertas;
   }

}