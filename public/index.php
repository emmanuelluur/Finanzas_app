<?php
include_once "../vendor/autoload.php";
session_start();

$map = [
    "ruta" =>
    [
        "ingresos" => ["file" => "../views/registraIngreso.php"],
        "gastos" => ["file" => "../views/registraGasto.php"],
        "usuario" => ["file" => "../views/usuario.php"],
        "login" => ["file" => "../views/login.php"],
        "logout" => ["file" => "../views/logout.php"],
        "edita-usuario" => ["file" => "../views/usuarioEdita.php"],
        "categorias" => ["file" => "../views/registraCategoria.php"]
    ],

];

//require_once ($map['ruta'][$_GET['route']]['file']);die;

if (!isset($_SESSION['idUser'])) {
    require_once "../views/login.php";
} else {
    $id = $_SESSION['idUser'];
    $route = $_GET['route'] ?? 'inicio';

    if ($route == 'inicio'):
        require_once "../views/index.php";
    elseif (@ file_exists($map['ruta'][$_GET['route']]['file'])):
        require_once $map['ruta'][$_GET['route']]['file'];
    else:
        require_once "../views/404.php";
    endif;
}
