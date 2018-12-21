<?php
require_once "../../vendor/autoload.php";
use Respect\Validation\Validator as v;
use App\Model\Usuarios;
use App\Controller\BaseController;

// guarda ingresos
if (isset($_POST['save'])) {
    $data = $_POST; //  datos enviados 
    //  reglas de validacion
    $name = v::stringType()->notEmpty();
    $lastname = v::stringType()->notEmpty();
    $email = v::stringType()->notEmpty();
    $password = v::stringType()->notEmpty();
    $image = v::stringType()->notEmpty();
   
    try {
        //  se validan los datos
        $name->assert($data['name']);
        $lastname->assert($data['lastname']);
        $email->assert($data['mail']);
        $password->assert($data['password']);
        $image->assert($data['image']);
        $opciones = [ //    costo password hash
            'cost' => 12,
        ];
        //  guardado BD
        $usuario = new Usuarios;
        $usuario->name = BaseController::avoidXss($data['name']);
        $usuario->lastname = BaseController::avoidXss($data['lastname']);
        $usuario->mail = BaseController::avoidXss($data['mail']);
        //  PASSWORD ENCRIPTADO
        $usuario->password = password_hash(BaseController::avoidXss($data['password']), PASSWORD_BCRYPT, $opciones);
        $usuario->image = BaseController::avoidXss($data['image']);
        $usuario->save();
        //  respuesta de guardado
        echo "<div class='alert alert-success'>Guardado</div>";
    } catch (\Exception $e) {
        //  Si falla la validacion $e->getMessage();
        echo $e->getMessage();"<div class='alert alert-danger'>Todos los campos son requeridos</div>";
    }

}
