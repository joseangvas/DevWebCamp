<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Categoria;
use Model\Ponente;
use Model\Dia;
use Model\Evento;
use Model\Hora;
use MVC\Router;

class EventosController {
  // Obtener la Lista General de los Eventos
  public static function index(Router $router) {
    $pagina_actual = $_GET['page'];
    $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

    if(!$pagina_actual || $pagina_actual < 1) {
      header('Location: /admin/eventos?page=1');
    }

    $por_pagina = 10;
    $total = Evento::total();
    $paginacion = new Paginacion($pagina_actual, $por_pagina, $total);

    $eventos = Evento::paginar($por_pagina, $paginacion->offset());

    foreach($eventos as $evento) {
      $evento->categoria = Categoria::find($evento->categoria_id);
      $evento->dia = Dia::find($evento->dia_id);
      $evento->hora = Hora::find($evento->hora_id);
      $evento->ponente = Ponente::find($evento->ponente_id);
    }

    $router->render('admin/eventos/index', [
      'titulo' => 'Conferencias y Eventos',
      'eventos' => $eventos,
      'paginacion' => $paginacion->paginacion()
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

  // Editar un Evento
  public static function editar(Router $router) {
    $alertas = [];

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    IF(!$id) {
      header('Location: /admin/eventos');
    }

    $categorias = Categoria::all('ASC');
    $dias = Dia::all('ASC');
    $horas = Hora::all('ASC');

    $evento = Evento::find($id);

    if(!$evento) {
      header('Location: /admin/eventos');
    }

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

    $router->render('admin/eventos/editar', [
      'titulo' => 'Editar Evento',
      'alertas' => $alertas,
      'categorias' => $categorias,
      'dias' => $dias,
      'horas' => $horas,
      'evento' => $evento
    ]);
  }
}