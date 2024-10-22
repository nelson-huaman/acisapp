<?php

namespace Model;

class ActiveRecord {

   protected static $db;
   protected static $tabla = '';
   protected static $columnasDB = [];
   protected static $alertas = [];

   // Definir la conexión a la BD
   public static function setDB($database) {
      self::$db = $database;
   }

   public static function setAlerta($tipo, $mensaje) {
      static::$alertas[$tipo][] = $mensaje;
   }

   public static function getAlertas() {
      return static::$alertas;
   }

   public function validar() {
      static::$alertas = [];
      return static::$alertas;
   }

   public function guardar() {
      $resultado = '';
      if(!is_null($this->id)) {
         $resultado = $this->actualizar();
      } else {
         $resultado = $this->crear();
      }
      return $resultado;
   }

   public function actualizar() {
      $atributos = $this->sanitizarAtributos();
      $valores = [];
      foreach ($atributos as $key => $value) {
         $valores[] = "{$key}='{$value}'";
      }
      $query = "UPDATE " . static::$tabla . " SET ";
      $query .= join(', ', $valores);
      $query .= " WHERE id='" . self::$db->escape_string($this->id) . "' LIMIT 1";
      $resultado = self::$db->query($query);
      return $resultado;
   }

   public function crear() {
      $atributos = $this->sanitizarAtributos();
      $query = "INSERT INTO " . static::$tabla . " (";
      $query .= join(', ',array_keys($atributos));
      $query .= ") VALUES ('";
      $query .= join("', '", array_values($atributos)) . "')";
      $resultado = self::$db->query($query);
      return [
         'resultado' => $resultado,
         // 'id' => self::$db->insert_id,
         $this->id = self::$db->insert_id
      ];
   }

   public function eliminar() {
      $query = "DELETE FROM " . static::$tabla;
      $query .= " WHERE id=" . self::$db->escape_string($this->id) . " LIMIT 1";
      $resultado = self::$db->query($query);
      return $resultado;
   }

   public function sanitizarAtributos() {
      $atributos = $this->atributos();
      $sanitizado = [];
      foreach($atributos as $key => $value) {
         $sanitizado[$key] = self::$db->escape_string($value);
      }
      return $sanitizado;
   }

   public function atributos() {
      $atributos = [];
      foreach(static::$columnasDB as $columna) {
         if($columna === 'id') continue;
         $atributos[$columna] = $this->$columna;
      }
      return $atributos;
   }

   public static function consultarSQL($query) {
      $resultado = self::$db->query($query);
      $array = [];
      while($registro = $resultado->fetch_assoc()) {
         $array[] = static::crearObjeto($registro);
      }
      $resultado->free();
      return $array;
   }

   public static function crearObjeto($registro) {
      $objeto = new static;
      foreach ($registro as $key => $value) {
         if(property_exists($objeto, $key)) {
            $objeto->$key = $value;
         }
      }
      return $objeto;
   }

   public static function all($orden = 'DESC', $estado = '') {
      $query = "SELECT * FROM " . static::$tabla;
      if($estado === 1) {
         $query .= " WHERE estado = ${estado}";
      }
      $query .= " ORDER BY id ${orden}";
      $resultado = self::consultarSQL($query);
      return $resultado;
   }

   public static function find($id) {
      $query = "SELECT * FROM " . static::$tabla;
      $query .= " WHERE id = ${id}";
      $resultado = self::consultarSQL($query);
      return array_shift($resultado);
   }

   public static function get($limite) {
      $query = "SELECT * FROM " . static::$tabla;
      $query .= " ORDER BY id DESC LIMIT ${limite}";
      $resultado = self::consultarSQL($query);
      return $resultado;
   }

   public static function paginar($por_pagina, $offset, $estado = '') {
      $query = "SELECT * FROM " . static::$tabla;
      if($estado === 1) {
         $query .= " WHERE estado = ${estado}";
      }
      $query .= " ORDER BY id DESC LIMIT ${por_pagina} OFFSET ${offset}";

      // echo $query;
      $resultado = self::consultarSQL($query);
      return $resultado;
   }

   public static function whereArray($array = []) {
      $query = "SELECT * FROM " . static::$tabla . " WHERE ";
      foreach ($array as $key => $value) {
         if($key == array_key_last($array)) {
            $query .= "${key} = '${value}'";
         } else {
            $query .= "${key} = '${value}' AND ";
         }
      }
      $resultado = self::consultarSQL($query);
      return $resultado;
   }

   public static function whereArrayOR($array = []) {
      $query = "SELECT * FROM " . static::$tabla . " WHERE ";
      foreach ($array as $key => $value) {
         if($key == array_key_last($array)) {
            $query .= "${key} = '${value}'";
         } else {
            $query .= "${key} = '${value}' OR ";
         }
      }
      $resultado = self::consultarSQL($query);
      return $resultado;
   }

   public static function where($columna, $valor) {
      $query = "SELECT * FROM " . static::$tabla;
      $query .= " WHERE ${columna} = '${valor}'";
      $resultado = self::consultarSQL($query);
      return array_shift($resultado);
   }

   public static function whereID($columna, $valor) {
      $query = "SELECT * FROM " . static::$tabla;
      $query .= " WHERE ${columna} = '${valor}'";
      $resultado = self::consultarSQL($query);
      return $resultado;
   }

   public static function findID($id) {
      return self::where('id', $id);
   }

   public static function ordenar($columna, $orden) {
      $query = "SELECT * FROM " . static::$tabla;
      $query .= " ORDER BY ${columna} ${orden}";
      $resultado = self::consultarSQL($query);
      return array_shift($resultado);
   }

   public static function ordenarLimite($columna, $orden, $limite) {
      $query = "SELECT * FROM " . static::$tabla;
      $query .= " ORDER BY ${columna} ${orden} LIMIT ${limite}";
      $resultado = self::consultarSQL($query);
      return $resultado;
   }

   public static function total($columna = '', $valor = '') {
      $query = "SELECT COUNT(*) FROM " . static::$tabla;
      if($columna) {
         $query .= " WHERE ${columna} = ${valor}";
      }
      $resultado = self::$db->query($query);
      $total = $resultado->fetch_array();
      return array_shift($total);
   }

   public static function totalArray($array = []) {
      $query = "SELECT COUNT(*) FROM " . static::$tabla . " WHERE ";
      foreach ($array as $key => $value) {
         if($key == array_key_last($array)) {
            $query .= "${key} = '${value}'";
         } else {
            $query .= "${key} = '${value}' AND";
         }
      }
      $resultado = self::$db->query($query);
      $total = $resultado->fetch_array();
      return array_shift($total);
   }

   public function sincronizar($args = []) {
      foreach ($args as $key => $value) {
         if(property_exists($this, $key) && !is_null($value)) {
            $this->$key = $value;
         }
      }
   }

}