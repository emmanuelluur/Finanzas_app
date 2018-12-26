<?php
require_once "../../vendor/autoload.php";
session_start();
use App\Controller\BaseController;
use App\Model\Ingresos;
use Respect\Validation\Validator as v;

$dotenv = new Dotenv\Dotenv("../../");
$dotenv->load();
// guarda ingresos

class IngresosController
{
    public function SaveIngresos($data)
    {
        //  reglas de validacion
        $description = v::stringType()->notEmpty();
        $monto = v::numeric()->notEmpty();
        $ticket = v::stringType()->notEmpty();
        $categoria = v::numeric();
        try {
            //  se validan los datos
            $description->assert($data['description']);
            $ticket->assert($data['ticket']);
            $monto->assert($data['mount']);
            $categoria->assert($data['categoria']);
            //  guardado BD
            $ingresos = new Ingresos;
            $ingresos->description = BaseController::avoidXss($data['description']);
            $ingresos->ticket = BaseController::avoidXss($data['ticket']);
            $ingresos->mount = BaseController::avoidXss($data['mount']);
            $ingresos->dateReg = DATE('Y-m-d');
            $ingresos->timeReg = DATE('H:i:s');
            $ingresos->eventType = 1;
            $ingresos->idCategoria = BaseController::avoidXss($data['categoria']);
            $ingresos->idUser = $_SESSION['idUser'];
            $ingresos->save();
            //  respuesta de guardado
            echo "<div class='alert alert-success'>Guardado</div>";
        } catch (\Exception $e) {
            //  Si falla la validacion $e->getMessage();
            echo $e->getMessage();"<div class='alert alert-danger'>Todos los campos son requeridos</div>";
        }
    }
}
$ingreso = new IngresosController;
if (isset($_POST['save'])) {
    $formulario = $_POST; //  datos enviados
    $ingreso->SaveIngresos($formulario);
}
