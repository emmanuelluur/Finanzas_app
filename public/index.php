<?php
include_once "../vendor/autoload.php";
session_start();

if (!isset($_SESSION['idUser'])) {
    require_once "../views/login.php";
} else {
    $id = $_SESSION['idUser'];
    $route = $_GET['route'] ?? 'inicio';

    if ($route == 'inicio'):
        require_once "../views/index.php";
    elseif (file_exists("../views/{$route}.php")):
        require_once "../views/{$route}.php";
    else:
        require_once "../views/404.php";
    endif;
}
