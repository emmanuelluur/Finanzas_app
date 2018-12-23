<?php
require_once "../../vendor/autoload.php";
session_start();
use App\Controller\BaseController;
use App\Model\Gastos;
use Respect\Validation\Validator as v;

$dotenv = new Dotenv\Dotenv("../../");
$dotenv->load();
// guarda ingresos

class GastosController
{
    public function SaveGastos($data)
    {
        $description = v::stringType()->notEmpty();
        $monto = v::numeric()->notEmpty();
        $ticket = v::stringType()->notEmpty();

        try {
            //  se validan los datos
            $description->assert($data['description']);
            $ticket->assert($data['ticket']);
            $monto->assert($data['mount']);

            //  guardado BD
            $gastos = new Gastos;
            $gastos->description = BaseController::avoidXss($data['description']);
            $gastos->ticket = BaseController::avoidXss($data['ticket']);
            $gastos->mount = BaseController::avoidXss($data['mount']);
            $gastos->dateReg = DATE('Y-m-d');
            $gastos->timeReg = DATE('H:i:s');
            $gastos->eventType = 2;
            $gastos->idUser = $_SESSION['idUser'];
            $gastos->save();
            //  respuesta de guardado
            echo "<div class='alert alert-success'>Guardado</div>";
        } catch (\Exception $e) {
            //  Si falla la validacion $e->getMessage();
            echo "<div class='alert alert-danger'>Todos los campos son requeridos</div>";
        }

    }
}
$gasto = new GastosController;

if (isset($_POST['save'])) {
    $formulario = $_POST; //  datos recibidos
    $gasto->SaveGastos($formulario);
}
