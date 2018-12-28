<?php
require_once "../../vendor/autoload.php";
use App\Controller\BaseController;
use App\Model\Eventos;
use App\Model\Usuarios;
use Respect\Validation\Validator as v;

session_start();
$dotenv = new Dotenv\Dotenv("../../");
$dotenv->load();

class UsuariosController extends BaseController
{
    public function EditUser($data)
    {
        //  Reglas de validacion
        $name = v::stringType()->notEmpty();
        $lastname = v::stringType()->notEmpty();
        //    $password = v::stringType()->notEmpty();
        $image = v::stringType()->notEmpty();
        try {
            //  se validan los datos
            $name->assert($data['name']);
            $lastname->assert($data['lastname']);
           
            $image->assert($data['image']);
            $mensaje = null;

            //  guardado BD
            $usuario =Usuarios::find($_SESSION['idUser']);
            $usuario->name = BaseController::avoidXss($data['name']);
            $usuario->lastname = BaseController::avoidXss($data['lastname']);
            $usuario->image = BaseController::avoidXss($data['image']);
            $usuario->save();
            $mensaje = "<div class='alert alert-success'>Guardado</div>";

            //  respuesta
            echo $mensaje;
        } catch (\Exception $e) {
            //  Si falla la validacion $e->getMessage();
            echo "<div class='alert alert-danger'>Todos los campos son requeridos</div>";
        }
    }
    public function GetUser($data)
    {
        $user = [
            "nombre" => "N/A",
            "imagen" => "../uploads/404.jpg",
            "appelido" => "N/A",
            "email" => "ex@example.com",
            "balance" => 0.000,
        ];
        //  Balance
        $ingresos = Eventos::Where([['idUser', $_SESSION['idUser']], ['eventType', 1]])->sum('mount');
        $egresos = Eventos::Where([['idUser', $_SESSION['idUser']], ['eventType', 2]])->sum('mount');
        $balance = $ingresos - $egresos;
        //  var_dump($balance);die;
        $usuario = Usuarios::find($_SESSION['idUser']); // en sql seria select * from tbl where id = 1
        if ($usuario != ''):
            $user = [
                "nombre" => $usuario->name,
                "imagen" => $usuario->image,
                "appelido" => $usuario->lastname,
                "email" => $usuario->mail,
                "balance" => $balance,
            ];
        endif;

        echo json_encode($user);
    }
    public function SaveUser($data)
    {
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
            $mensaje = null;
            //  Busca mail registrado
            $userBd = Usuarios::where("mail", "=", $data['mail'])->get();

            //  guardado BD
            if (count($userBd) == 0 || $userBd[0]->mail != $data['mail']) { //  Verifica que mail no este registrado
                $usuario = new Usuarios;

                $usuario->name = BaseController::avoidXss($data['name']);
                $usuario->lastname = BaseController::avoidXss($data['lastname']);
                $usuario->mail = BaseController::avoidXss($data['mail']);
                //  PASSWORD ENCRIPTADO
                $usuario->password = password_hash(BaseController::avoidXss($data['password']), PASSWORD_BCRYPT, $opciones);
                $usuario->image = BaseController::avoidXss($data['image']);
                $usuario->save();
                $mensaje = "<div class='alert alert-success'>Guardado</div>";
            } else {
                $mensaje = "<div class='alert alert-danger'>Correo ya registrado</div>";
            }
            //  respuesta
            echo $mensaje;
        } catch (\Exception $e) {
            //  Si falla la validacion $e->getMessage();
            echo "<div class='alert alert-danger'>Todos los campos son requeridos</div>";
        }
    }
}
$usuario = new UsuariosController;
// guarda usuario
if (isset($_POST['save'])) {
    $formulario = $_POST; //  datos enviados
    $usuario->SaveUser($formulario);
}

// muestra usuario
if (isset($_GET['getUser'])) {
    $formulario = $_GET; //  datos enviados
    $usuario->GetUser($formulario);
}

//  Edita usuario

if (isset($_POST['editUser'])) {
    $formulario = $_POST;
    $usuario->EditUser($formulario);
}
