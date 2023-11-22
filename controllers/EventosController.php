<?php

namespace Controllers;

use Model\Categoria;
use Model\Dia;
use Model\Evento;
use Model\Hora;
use MVC\Router;

class EventosController {
  // Obtener la Lista General de los Eventos
  public static function index(Router $router) {

    $router->render('admin/eventos/index', [
      'titulo' => 'Conferencias y Eventos'
    ]);
  }

  // Crear un Evento
  public static function crear(Router $router) {
    $alertas = [];

    $categorias = Categoria::all('ASC');
    $dias = Dia::all('ASC');
    $horas = Hora::all('ASC');

    $evento = new Evento;

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

      $evento->sincronizar($_POST);
      $alertas = $evento->validar();

      if(!$alertas) {
        $resultado = $evento->guardar();

        if($resultado) {
          header('Location: /admin/eventos/crear');
        }
      }
    }

    $router->render('admin/eventos/crear', [
      'titulo' => 'Registrar Conferencia / Evento',
      'alertas' => $alertas,
      'categorias' => $categorias,
      'dias' => $dias,
      'horas' => $horas,
      'evento' => $evento
    ]);
  }
}