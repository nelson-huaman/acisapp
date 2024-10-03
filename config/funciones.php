<?php

function debuguear($variable) : string {
   echo '<pre>';
   var_dump($variable);
   echo '</pre>';
   exit;
}

function stringHTML($html) : string {
   $s = htmlspecialchars($html);
   return $s;
}

function paginaActual($path) : bool {
   return str_contains($_SERVER['PATH_INFO'] ?? '/', $path) ? true : false;
}

function isLogin() : bool {
   if(!isset($_SESSION)) {
      session_start();
   }
   // return $_SESSION;
   return isset($_SESSION['username']) && !empty($_SESSION['username']);
}

function isAdmin() : bool {
   if(!isset($_SESSION)) {
      session_start();
   }
   return isset($_SESSION['admin']) && !empty($_SESSION['admin']);
}