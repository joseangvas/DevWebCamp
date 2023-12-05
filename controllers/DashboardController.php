<?php

namespace Controllers;

use Model\Registro;
use Model\Usuario;
use MVC\Router;

class DashboardController {

  public static function index(Router $router) {

    // Obtener untimos registros
    $registros = Registro::get(5);

    foreach($registros as $registro) {
      $registro->usuario = Usuario::find($registro->usuario_id);
    }

    // Calcular los Ingresos
    $virtuales = Registro::total('paquete_id', 2);
    $presenciales = Registro::total('paquete_id', 1);

    $ingresos = ($virtuales * 46.05) + ($presenciales * 187.95);


    $router->render('admin/dashboard/index', [
      'titulo' => 'Panel de Administración',
      'registros' => $registros,
      'ingresos' => $ingresos
    ]);
  }
}