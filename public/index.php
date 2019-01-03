<?php
include_once "../vendor/autoload.php";
session_start();

$map = [];

if (!isset($_SESSION['idUser'])) {
    $map = [
        "ruta" =>
        [
            "test" => ["file" => "../views/test.php"],
            "ingresos" => ["file" => "../views/login.php"],
            "gastos" => ["file" => "../views/login.php"],
            "usuario" => ["file" => "../views/usuario.php"],
            "login" => ["file" => "../views/login.php"],
            "logout" => ["file" => "../views/logout.php"],
            "edita-usuario" => ["file" => "../views/login.php"],
            "categorias" => ["file" => "../views/login.php"],
            "" => ["file" => "../views/login.php"],
            "inicio" => ["file" => "../views/login.php"]
            
        ],
    ];
     //  $id = $_SESSION['idUser'];
     $route = $_GET['route'] ?? 'inicio';

     if ($route == 'inicio'):
         @require_once "../views/login.php";
     elseif (@ file_exists($map['ruta'][$_GET['route']]['file'])):
         require_once $map['ruta'][$_GET['route']]['file'];
     else:
         require_once "../views/404.php";
     endif;
} else {
    $map = [
        "ruta" =>
        [
            "inicio" => ["file" => "../views/index.php"],
            "test" => ["file" => "../views/test.php"],
            "ingresos" => ["file" => "../views/registraIngreso.php"],
            "gastos" => ["file" => "../views/registraGasto.php"],
            "usuario" => ["file" => "../views/usuario.php"],
            "login" => ["file" => "../views/login.php"],
            "logout" => ["file" => "../views/logout.php"],
            "edita-usuario" => ["file" => "../views/usuarioEdita.php"],
            "categorias" => ["file" => "../views/registraCategoria.php"]
        ],
    
    ];
     //  $id = $_SESSION['idUser'];
     $route = $_GET['route'] ?? 'inicio';

     if ($route == 'inicio'):
         @require_once "../views/index.php";
     elseif (@ file_exists($map['ruta'][$_GET['route']]['file'])):
         require_once $map['ruta'][$_GET['route']]['file'];
     else:
         require_once "../views/404.php";
     endif;
}

//require_once ($map['ruta'][$_GET['route']]['file']);die;


   
