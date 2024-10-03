<?php

namespace Model;

class Matricula extends ActiveRecord {

   protected static $tabla = 'matricula';
   protected static $columnasDB = ['id', 'idUsuario', 'idCliente', 'idServicio', 'idModalidad', 'idFuente', 'idPromocion', 'idBeneficio', 'idAccesorio', 'fechaMatricula', 'condicion', 'estado'];

   public $id;
   public $idUsuario;
   public $idCliente;
   public $idServicio;
   public $idModalidad;
   public $idFuente;
   public $idPromocion;
   public $idBeneficio;
   public $idAccesorio;
   public $fechaMatricula;
   public $condicion;
   public $estado;

   public function __construct($args = []) {
      $this->id = $args['id'] ?? null;
      $this->idUsuario = $args['idUsuario'] ?? '';
      $this->idCliente = $args['idCliente'] ?? '';
      $this->idServicio = $args['idServicio'] ?? '';
      $this->idModalidad = $args['idModalidad'] ?? '';
      $this->idFuente = $args['idFuente'] ?? '';
      $this->idPromocion = $args['idPromocion'] ?? '';
      $this->idBeneficio = $args['idBeneficio'] ?? '';
      $this->idAccesorio = $args['idAccesorio'] ?? '';
      $this->fechaMatricula = $args['fechaMatricula'] ?? '';
      $this->condicion = $args['condicion'] ?? '';
      $this->estado = $args['estado'] ?? 1;
   }
}