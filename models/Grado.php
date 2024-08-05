<?php

namespace Model;

class Grado extends ActiveRecord {

   protected static $tabla = 'grado_academico';
   protected static $columnasDB = ['id', 'gradoAcademico', 'descripcion', 'estado'];

   public $id;
   public $gradoAcademico;
   public $descripcion;
   public $estado;

   public function __construct($args = []) {
      $this->id = $args['id'] ?? null;
      $this->gradoAcademico = $args['gradoAcademico'] ?? '';
      $this->descripcion = $args['descripcion'] ?? '';
      $this->estado = $args['estado'] ?? 1;
   }

   public function validarGrado() : array {
      if(!$this->gradoAcademico) {
         self::$alertas['error'][] = 'El grado académico es obligatorio';
      }

      return self::$alertas;
   }

}