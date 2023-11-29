<?php

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

//* Marcar Opción seleccionada en el Menú Sidebar
function pagina_actual($path) : bool {
    return str_contains($_SERVER['PATH_INFO'] ?? '/', $path) ? true : false;
}

function is_auth() : bool {
    if(!isset($_SESSION)) {
        session_start();
    }

    return isset($_SESSION['nombre']) && !empty($_SESSION);
}

function is_admin() : bool {
    if(!isset($_SESSION)) {
        session_start();
    }

    return isset($_SESSION['admin']) && !empty($_SESSION['admin']);
}

function aos_animacion() : void {
    $efectos = [
        'fade-up',
        'fade-down',
        'fade-left',
        'fade-right',
        'flip-up',
        'flip-down',
        'flip-left',
        'flip-right',
        'zoom-in',
        'zoom-in-up',
        'zoom-in-down',
        'zoom-in-left',
        'zoom-in-right',
        'zoom-out',
        'zoom-out-up',
        'zoom-out-down',
        'zoom-out-left',
        'zoom-out-right'
    ];

    $efecto = array_rand($efectos, 1);
    echo ' data-aos="' . $efectos[$efecto] . '" ';
}
