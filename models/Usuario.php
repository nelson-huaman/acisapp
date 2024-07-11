<?php

namespace Model;

class Usuario extends ActiveRecord {

   protected static $tabla = 'usuario';
   protected static $columnasDB = ['id', 'nombre', 'apellidoPaterno', 'apellidoMaterno', 'dni', 'username', 'email', 'password', 'token', 'confirmado', 'idRol', 'idSede', 'estado'];

   public $id;
   public $nombre;
   public $apellidoPaterno;
   public $apellidoMaterno;
   public $dni;
   public $username;
   public $email;
   public $password;
   public $token;
   public $confirmado;
   public $idRol;
   public $idSede;
   public $estado;

   public function __construct($args = []) {
      $this->id = $args['id'] ?? null;
      $this->nombre = $args['nombre'] ?? '';
      $this->apellidoPaterno = $args['apellidoPaterno'] ?? '';
      $this->apellidoMaterno = $args['apellidoMaterno'] ?? '';
      $this->dni = $args['dni'] ?? '';
      $this->username = $args['username'] ?? '';
      $this->email = $args['email'] ?? '';
      $this->password = $args['password'] ?? '';
      $this->token = $args['token'] ?? '';
      $this->confirmado = $args['confirmado'] ?? 0;
      $this->idRol = $args['idRol'] ?? '';
      $this->idSede = $args['idSede'] ?? '';
      $this->estado = $args['estado'] ?? 0;
   }

   public function validarLogin() : array {

      if(!$this->email) {
         self::$alertas['error'][] = 'El correo es obligatorio';
      }

      if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
         self::$alertas['error'][] = 'Correo no válido';
      }

      if(!$this->password) {
         self::$alertas['error'][] = 'La contraseña no puede ir vacio';
      }

      return self::$alertas;
   }

   public function validarUsuario() : array {

      if(!$this->nombre) {
         self::$alertas['error'][] = 'El nombre es obligatorio';
      }

      if(!$this->apellidoPaterno) {
         self::$alertas['error'][] = 'El apellido paterno es obligatorio';
      }

      if(!$this->apellidoMaterno) {
         self::$alertas['error'][] = 'El apellido materno es obligatorio';
      }

      if(!$this->dni) {
         self::$alertas['error'][] = 'El DNI es obligatorio';
      }

      if(!filter_var($this->dni, FILTER_VALIDATE_INT)) {
         self::$alertas['error'][] = 'DNI no válido';
      }

      if(!$this->email) {
         self::$alertas['error'][] = 'El correo es obligatorio';
      }

      if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
         self::$alertas['error'][] = 'Correo no válido';
      }

      if(!$this->idRol) {
         self::$alertas['error'][] = 'El rol es obligatorio';
      }

      if(!filter_var($this->idRol, FILTER_VALIDATE_INT)) {
         self::$alertas['error'][] = 'Rol no válido';
      }

      if(!$this->idSede) {
         self::$alertas['error'][] = 'El sede es obligatorio';
      }

      if(!filter_var($this->idSede, FILTER_VALIDATE_INT)) {
         self::$alertas['error'][] = 'Sede no válido';
      }

      return self::$alertas;
   }

   public function crearToken() : void {
      $this->token = uniqid();
   }

}