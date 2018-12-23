<?php
require_once "../../vendor/autoload.php";
session_start();
use App\Model\{Eventos};
use Respect\Validation\Validator as v;
$dotenv = new Dotenv\Dotenv("../../");
$dotenv->load();
// guarda ingresos

class BalanceController {
    function GetBalance()
    {
        
        $ingresos =  Eventos::Where([['idUser', $_SESSION['idUser']], ['eventType', 1]])->sum('mount');
        $egresos = Eventos::Where([['idUser', $_SESSION['idUser']], ['eventType', 2]])->sum('mount');
        $balance = $ingresos - $egresos;
        
        echo $balance;
    }
    function GetEventos()
    {
        $eventos = Eventos::Where('idUser', $_SESSION['idUser'])
        ->take(10)
        ->latest()
        ->get();
        
        echo json_encode($eventos);
    }
}

$balance = new BalanceController;

if (isset($_GET['getEvents']))
{
    $balance->GetEventos();
}

if (isset($_GET['getBalance']))
{
    $balance->GetBalance();
}