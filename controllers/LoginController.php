<?php

namespace Controllers;

use Model\Rol;
use Model\Usuario;
use MVC\Router;

class LoginController {

   public static function login(Router $router) {

      $alertas = [];
      if($_SERVER['REQUEST_METHOD'] === 'POST') {
         
         $usuario = new Usuario($_POST);
         $alertas = $usuario->validarLogin();
         if(empty($alertas)) {
            $usuario = Usuario::where('email', $usuario->email);
            if(!$usuario || !$usuario->confirmado) {
               Usuario::setAlerta('error', 'El usuario no exisite o no esta confirmado');
            } else {
               if(password_verify($_POST['password'], $usuario->password)) {
                  session_start();
                  $_SESSION['id'] = $usuario->id;
                  $_SESSION['nombre'] = $usuario->nombre . ' ' . $usuario->apellidoPaterno;
                  $_SESSION['username'] = $usuario->username;
                  $_SESSION['rol'] = Rol::find($usuario->idRol);

                  // debuguear($_SESSION);

                  if($usuario->idRol === '1') {
                     $_SESSION['admin'] = $usuario->idRol;
                     header('Location: /admin/dashboard');
                  } else {
                     header('Location: /asesor/dashboard');
                  }

               } else {
                  Usuario::setAlerta('error', 'Contraseña incorrecta');
               }
            }
         }
      }

      $alertas = Usuario::getAlertas();
      $router->renderizar('login/login', [
         'titulo' => 'Iniciar Sesión',
         'alertas' => $alertas
      ]);
      
   }

   public static function logout() {
      if($_SERVER['REQUEST_METHOD'] === 'POST') {
         session_start();
         $_SESSION = [];
         header('Location: /');
      }
   }

   public static function confirmar() {

   }
}