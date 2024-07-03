<?php

namespace Controllers;

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
               Usuario::setAlerta('error', 'El usuario no exisite p no esta confirmado');
            } else {
               if(password_verify($_POST['password'], $usuario->password)) {
                  session_start();
                  $_SESSION['id'] = $usuario->id;
                  $_SESSION['nombre'] = $usuario->nombre;
                  $_SESSION['email'] = $usuario->email;
                  $_SESSION['rol'] = $usuario->rolId;

                  if($usuario->rolId === '1') {
                     header('Location: /admin/dashboard');
                  } else {
                     header('Location: /asesor/dashborad');
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

   }
}