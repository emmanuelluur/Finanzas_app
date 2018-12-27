<?php

require_once "../../vendor/autoload.php";
session_start();
use App\Controller\BaseController;
use App\Model\{Categorias};
use Respect\Validation\Validator as v;
$dotenv = new Dotenv\Dotenv("../../");
$dotenv->load();


class CategoriasController
{
    public function SaveCategoria($data)
    {
        var_dump($data);
    }
}

$categoria = new CategoriasController;

if (isset($_POST['save'])) {
    $formulario = $_POST;
    $categoria->SaveCategoria($formulario);
}