<?php
include_once "../vendor/autoload.php";

$route = $_GET['route'] ?? '/';

$protected = "all";

if($route == '/'):
    require_once "../views/index.php";
elseif(file_exists("../views/{$route}.php")):
    require_once "../views/{$route}.php";
else:
    echo "Se perdio este archivo...";
endif;