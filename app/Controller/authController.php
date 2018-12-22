<?php
require_once "../../vendor/autoload.php";
session_start();
use App\Model\Usuarios;
use Respect\Validation\Validator as v;

// guarda ingresos
if (isset($_POST['loginAuth'])) {
    $data = $_POST; //  datos enviados

    //  reglas de validacion
    $email = v::stringType()->notEmpty();
    $password = v::stringType()->notEmpty();

    try {
        //  se validan los datos
        $email->assert($data['mail']);
        $password->assert($data['mail']);
        //  guardado BD
        $usuario = Usuarios::where("mail", $data['mail'])->first();
        if ($usuario == '') {
            echo  "<div class = 'alert alert-danger'> Credenciales Incorrectas </div>";
        } else {
            if (password_verify($data['password'], $usuario->password)) {
                $_SESSION['idUser'] = $usuario->id;
                $_SESSION['required'] = true;
                echo "<div class = 'alert alert-success'>Inica sesión </div>";
            } else {
                echo "<div class = 'alert alert-danger'> Credenciales Incorrectas </div>";
            }
        }

    } catch (\Exception $e) {
        echo $e->getMessage();
    }

}
