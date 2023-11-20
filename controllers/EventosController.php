<?php

namespace Controllers;

use MVC\Router;

class EventosController {

  public static function index(Router $router) {

    $router->render('admin/eventos/index', [
      'titulo' => 'Conferencias y Eventos'
    ]);
  }

  public static function crear(Router $router) {
    $alertas = [];



    $router->render('admin/eventos/crear', [
      'titulo' => 'Registrar Conferencia / Evento',
      'alertas' => $alertas
    ]);
  }
}