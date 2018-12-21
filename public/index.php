<?php
include_once "../vendor/autoload.php";

$route = $_GET['route'] ?? '/';

$protected = "all";

if($route == '/'):
    require_once "../views/index.php";
else:
    require_once "../views/{$route}.php";
endif;