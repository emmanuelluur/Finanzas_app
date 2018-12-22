<?php
require_once "../../vendor/autoload.php";
use Respect\Validation\Validator as v;
use App\Model\Usuarios;
use App\Controller\BaseController;

// guarda usuario
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
        echo "<div class='alert alert-danger'>Todos los campos son requeridos</div>";
    }

}


// muestra usuario
if (isset($_GET['getUser'])) {
    $data = $_GET; //  datos enviados 
    //  reglas de validacion
    try {
        //  listado BD
        $usuario = Usuarios::where('id', 1)->first();
        //  respuesta de consulta
        $user = array(
            "nombre" => $usuario->name,
            "imagen" => $usuario->image,
        );
        echo json_encode($user);
    } catch (\Exception $e) {
        //  Si falla la validacion $e->getMessage();
        return "<div class='alert alert-danger'>Todos los campos son requeridos</div>";
    }

}