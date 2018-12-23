<?php
require_once "../../vendor/autoload.php";
session_start();
use App\Model\Usuarios;
use Respect\Validation\Validator as v;

$dotenv = new Dotenv\Dotenv("../../");
$dotenv->load();

class AuthController
{
    public function Auth($data)
    {
        $email = v::stringType()->notEmpty();
        $password = v::stringType()->notEmpty();

        try {
            //  se validan los datos
            $email->assert($data['mail']);
            $password->assert($data['mail']);
            //  guardado BD
            $usuario = Usuarios::where("mail", $data['mail'])->first();
            if ($usuario == '') {
                echo "<div class = 'alert alert-danger'> Credenciales Incorrectas </div>";
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
}

// Auth POST 
if (isset($_POST['loginAuth'])) {
    $form = $_POST; //  datos enviados
    $login =  new AuthController;
    $login->Auth($form);
}
