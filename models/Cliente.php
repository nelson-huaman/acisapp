<?php

namespace Model;

class Cliente extends ActiveRecord {

   protected static $tabla = 'cliente';
   protected static $columnasDB = ['id', 'nombre', 'apellidoPaterno', 'apellidoMaterno', 'fechaNacimiento', 'tipoDocumento', 'numeroDocumento', 'email', 'telefono', 'idProfesion', 'idGrado', 'colegiatura', 'estado'];

   public $id;
   public $nombre;
   public $apellidoPaterno;
   public $apellidoMaterno;
   public $fechaNacimiento;
   public $tipoDocumento;
   public $numeroDocumento;
   public $email;
   public $telefono;
   public $idProfesion;
   public $idGrado;
   public $colegiatura;
   public $estado;

   public function __construct($args = []) {
      $this->id = $args['id'] ?? null;
      $this->nombre = $args['nombre'] ?? '';
      $this->apellidoPaterno = $args['apellidoPaterno'] ?? '';
      $this->apellidoMaterno = $args['apellidoMaterno'] ?? '';
      $this->fechaNacimiento = $args['fechaNacimiento'] ?? '1991-01-01';
      $this->tipoDocumento = $args['tipoDocumento'] ?? '';
      $this->numeroDocumento = $args['numeroDocumento'] ?? '';
      $this->email = $args['email'] ?? '';
      $this->telefono = $args['telefono'] ?? '';
      $this->idProfesion = $args['idProfesion'] ?? '';
      $this->idGrado = $args['idGrado'] ?? '';
      $this->colegiatura = $args['colegiatura'] ?? '';
      $this->estado = $args['estado'] ?? 1;
   }
   
   public function validarCliente() : array {
      // if(!$this->nombre) {
      //    self::$alertas['error'][] = 'El nombre es obligatorio';
      // }

      // if(!$this->apellidoPaterno) {
      //    self::$alertas['error'][] = 'El apellido paterno es obligatorio';
      // }

      // if(!$this->tipoDocumento) {
      //    self::$alertas['error'][] = 'El tipo de documento es obligatorio';
      // }

      // if(!$this->numeroDocumento) {
      //    self::$alertas['error'][] = 'El número de documento es obligatorio';
      // }

      // if(!$this->email) {
      //    self::$alertas['error'][] = 'El correo es obligatorio';
      // }

      // if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      //    self::$alertas['error'][] = 'Correo no válido';
      // }

      return self::$alertas;
   }
   
}