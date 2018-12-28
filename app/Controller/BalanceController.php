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
        //  SELECT tbl_eventos.description, tbl_eventos.mount, tbl_categorias.categoria FROM `tbl_eventos` 
        //  LEFT JOIN tbl_categorias ON tbl_eventos.idCategoria = tbl_categorias.id
        $eventosJoin = Eventos::leftJoin("tbl_categorias", "tbl_eventos.idCategoria", "=", "tbl_categorias.id")
            ->Where('tbl_eventos.idUser', $_SESSION['idUser'])
            ->select("tbl_eventos.description AS descripcion","tbl_eventos.mount AS monto", "tbl_categorias.categoria AS cate")
            ->take(10)
            ->orderBy('tbl_eventos.created_at', 'desc')
            ->get();
        // $eventos = Eventos::Where('idUser', $_SESSION['idUser'])
        // ->take(10)
        // ->latest()
        // ->get();
        
        echo json_encode ($eventosJoin);
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