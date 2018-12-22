<?php
require_once "../../vendor/autoload.php";
use Respect\Validation\Validator as v;
use App\Model\Ingresos;
use App\Controller\BaseController;

// guarda ingresos
if (isset($_POST['save'])) {
    $data = $_POST; //  datos enviados 
    
    //  reglas de validacion
    $description = v::stringType()->notEmpty();
    $monto = v::numeric()->notEmpty();
    $ticket = v::stringType()->notEmpty();
    $idUser = v::intVal()->notEmpty();
   
    try {
        //  se validan los datos
        $description->assert($data['description']);
        $ticket->assert($data['ticket']);
        $monto->assert($data['mount']);
        $idUser->assert($data['idUser']);
        //  guardado BD
        $ingresos = new Ingresos;
        $ingresos->description = BaseController::avoidXss($data['description']);
        $ingresos->ticket = BaseController::avoidXss($data['ticket']);
        $ingresos->mount = BaseController::avoidXss($data['mount']);
        $ingresos->dateReg = DATE('Y-m-d');
        $ingresos->timeReg = DATE('H:i:s');
        $ingresos->eventType = 1;
        $ingresos->idUser = BaseController::avoidXss($data['idUser']);
        $ingresos->save();
        //  respuesta de guardado
        echo "<div class='alert alert-success'>Guardado</div>";
    } catch (\Exception $e) {
        //  Si falla la validacion $e->getMessage();
        echo "<div class='alert alert-danger'>Todos los campos son requeridos</div>";
    }

}
