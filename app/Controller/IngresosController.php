<?php
require_once "../../vendor/autoload.php";
use Respect\Validation\Validator as v;

// guarda ingresos
if (isset($_POST['save'])) {
    $data = $_POST; //  datos enviados 
    //  reglas de validacion
    $description = v::stringType()->notEmpty();
    $monto = v::numeric()->notEmpty();
    $ticket = v::numeric()->notEmpty();
   
    try {
        //  se validan los datos
        $description->assert($data['description']);
        $ticket->assert($data['ticket']);
        $monto->assert($data['mount']);
        //  guardado BD

        //  respuesta de guardado
        echo "<div class='alert alert-success'>Guardado</div>";
    } catch (\Exception $e) {
        //  Si falla la validacion
        echo "<div class='alert alert-danger'>Todos los campos son requeridos</div>";
    }

}
