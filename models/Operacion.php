<?php

namespace Model;

class Operacion extends ActiveRecord {

   protected static $tabla = 'operacion';
   protected static $columnasDB = ['id', 'idMatricula', 'idMetodo', 'idBanco', 'monto', 'numeroOperacion', 'fechaComprobante', 'fechaRegistro', 'estado'];
   
   public $id;
   public $idMatricula;
   public $idMetodo;
   public $idBanco;
   public $monto;
   public $numeroOperacion;
   public $fechaComprobante;
   public $fechaRegistro;
   public $estado;

   public function __construct($args = []) {
      $this->id = $args['id'] ?? null;
      $this->idMatricula = $args['idMatricula'] ?? '';
      $this->idMetodo = $args['idMetodo'] ?? '';
      $this->idBanco = $args['idBanco'] ?? date('Y-m-d');
      $this->monto = $args['monto'] ?? '';
      $this->numeroOperacion = $args['numeroOperacion'] ?? '';
      $this->fechaComprobante = $args['fechaComprobante'] ?? '';
      $this->fechaRegistro = $args['fechaRegistro'] ?? '';
      $this->estado = $args['estado'] ?? 1;
   }

}