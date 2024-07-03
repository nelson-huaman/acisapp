<?php

namespace Model;

class Usuario extends ActiveRecord {

   protected static $tabla = 'usuario';
   protected static $columnasDB = ['id', 'nombre', 'apellidoPaterno', 'apellidoMaterno', 'dni', 'username', 'email', 'password', 'token', 'confirmado', 'rolId', 'sedeId', 'estado'];

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
   public $rolId;
   public $sedeId;
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
      $this->confirmado = $args['confirmado'] ?? '';
      $this->rolId = $args['rolId'] ?? '';
      $this->sedeId = $args['sedeId'] ?? '';
      $this->estado = $args['estado'] ?? '';
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

}