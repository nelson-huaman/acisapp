<?php

namespace Model;

class ControlMatricula extends ActiveRecord {

   protected static $tabla = 'control_matricula';
   protected static $columnasDB = ['id', 'idUsuario', 'idMatricula', 'fechaControl', 'observacion', 'condicion', 'estado'];

   public $id;
   public $idUsuario;
   public $idMatricula;
   public $fechaControl;
   public $observacion;
   public $condicion;
   public $estado;

   public function __construct($args = []) {
      $this->id = $args['id'] ?? null;
      $this->idUsuario = $args['idUsuario'] ?? '';
      $this->idMatricula = $args['idMatricula'] ?? '';
      $this->fechaControl = $args['fechaControl'] ?? date('Y-m-d');
      $this->observacion = $args['observacion'] ?? '';
      $this->condicion = $args['condicion'] ?? '';
      $this->estado = $args['estado'] ?? 1;
   }

}