<?php
include_once "../vendor/autoload.php";

$route = $_GET['route'] ?? 'inicio';

$protected = "all";

if($route == 'inicio'):
    require_once "../views/index.php";
elseif(file_exists("../views/{$route}.php")):
    require_once "../views/{$route}.php";
else:
    require_once "../views/404.php";
endif;