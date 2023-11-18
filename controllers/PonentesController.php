<?php

namespace Controllers;

use MVC\Router;
use Model\Ponente;
use Intervention\Image\ImageManagerStatic as Image;

class PonentesController {

  public static function index(Router $router) {
    $ponentes = Ponente::all();


    $router->render('admin/ponentes/index', [
      'titulo' => 'Ponentes / Conferencistas',
      'ponentes' => $ponentes
    ]);
  }


  //* Crear un Nuevo Ponente o Conferencista
  public static function crear(Router $router) {
    $alertas = [];
    $ponente = new Ponente;

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Leer Imagen
      if(!empty($_FILES['imagen']['tmp_name'])) {
        
        $carpeta_imagenes = '../public/img/speakers';

        // Crear Carpeta de Imágenes si no Existe
        if(!is_dir($carpeta_imagenes)) {
          mkdir($carpeta_imagenes, 0755, true);
        }

        // Convertir Imágen con Intervention Image
        $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png', 80);
        $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp', 80);

        $nombre_imagen = md5(uniqid(rand(), true));
        $_POST['imagen'] = $nombre_imagen;
      }
      
      $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);
      $ponente->sincronizar($_POST);

      // Validar
      $alertas = $ponente->validar();

      // Guardar el Registro
      if(empty($alertas)) {

        // Guardar las Imágenes
        $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
        $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");

        // Guardar en la Base de Datos
        $resultado = $ponente->guardar();

        if($resultado) {
          header('Location: /admin/ponentes');
        }
      }
    }

    $router->render('admin/ponentes/crear', [
      'titulo' => 'Registrar ponente o conferencista',
      'alertas' => $alertas,
      'ponente' => $ponente,
      'redes' =>   json_decode($ponente->redes)
    ]);
  }


  public static function editar(Router $router) {

    $alertas = [];

    // Validar el ID
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
      header('Location: /admin/ponentes');
    }
    
    // Obtener el Ponente a Editar
    $ponente = Ponente::find($id);

    if(!$ponente) {
      header('Location: /admin/ponentes');
    }

    $ponente->imagen_actual = $ponente->imagen;

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Leer Imagen
      if(!empty($_FILES['imagen']['tmp_name'])) {
  
        $carpeta_imagenes = '../public/img/speakers';

        // Crear Carpeta de Imágenes si no Existe
        if(!is_dir($carpeta_imagenes)) {
          mkdir($carpeta_imagenes, 0755, true);
        }

        // Convertir Imágen con Intervention Image
        $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png', 80);
        $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp', 80);

        $nombre_imagen = md5(uniqid(rand(), true));
        $_POST['imagen'] = $nombre_imagen;
      } else {
        $_POST['imagen'] = $ponente->imagen_actual;
      }

      $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);
      $ponente->sincronizar($_POST);

      $alertas= $ponente->validar();

      if(empty($alertas)) {
        if(isset($nombre_imagen)) {
          // Guardar las Imágenes
          $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
          $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");
        }

        $resultado = $ponente->guardar();

        if($resultado) {
          header('Location: /admin/ponentes');
        }
      }
    }

    $router->render('admin/ponentes/editar', [
      'titulo' => 'Actualizar ponente o conferencista',
      'alertas' => $alertas,
      'ponente' => $ponente,
      'redes' => json_decode($ponente->redes)
    ]);
  }

  public static function eliminar() {


    if($_SERVER['REQUEST_METHOD'] === 'POST') {

      $id = $_POST['id'];
      $ponente = Ponente::find($id);

      if(!isset($ponente)) {
        header('Location: /admin/ponentes');
      }

      $resultado = $ponente->eliminar();

      if($resultado) {
        header('Location: /admin/ponentes');
      }

    }
  }
}