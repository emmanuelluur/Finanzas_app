<?php

require_once "../../vendor/autoload.php";
session_start();
use App\Controller\BaseController;

use App\Model\Categoria;
use Respect\Validation\Validator as v;

$dotenv = new Dotenv\Dotenv("../../");
$dotenv->load();

class CategoriasController
{
    public function GetCategoria()
    {
        $categoria = 
        Categoria::where("idUser", $_SESSION['idUser'])
        ->get();

        echo json_encode($categoria);
    }
    public function SaveCategoria($data)
    {
        $messge = null;
        //  reglas de validacion
        $categoria = v::stringType()->notEmpty();
        //  var_dump($data);
        try {
            $categoria->assert($data['categoria']);
            $categoriaBd = Categoria::where("categoria", $data['categoria'])->get();

            if (count($categoriaBd) == 0 || $categoriaBd[0]->categoria != $data['categoria']) {
                $categorias = new Categoria;
                $categorias->categoria = BaseController::avoidXss($data['categoria']);
                $categorias->idUser = $_SESSION['idUser'];
                $categorias->save();
                $messge = "<div class = 'alert alert-success'>Guardado</div>";
            } else {
                $messge = "<div class = 'alert alert-danger'>Categoria Ya Existe!</div>";
            }
           
        } catch (\Exception $e) {
            //$e->getMessage();
            $messge = "<div class = 'alert alert-danger'>Error</div>";
        }
        echo $messge;
    }
}

$categoria = new CategoriasController;

if (isset($_POST['save'])) {
    $formulario = $_POST;

    $categoria->SaveCategoria($formulario);
}

if (isset($_GET['getCategoria'])) {
    $categoria->GetCategoria();
}
