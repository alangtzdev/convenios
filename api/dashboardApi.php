<?php
require_once "../models/dashBoardModel.php";

class DashBoardApi
{

    public function getDatosConveniosApi()
    {
        $response = DashboardModel::getDatosConvenios('convenios');
        echo json_encode($response);
    }
    public function getDatosContratosModelApi()
    {
        $response = DashboardModel::getDatosContratos('contratos');
        echo json_encode($response);
    }

}
//Obtenemos peticion
$request = json_decode(file_get_contents('php://input'), true);
$file = file_get_contents('php://input');

// Dependiendo la peticion que recibamos realiza diferente accion

if(isset($request["getDatosConvenios"])){

    $b = new DashBoardApi();
    $b -> getDatosConveniosApi();

} else if(isset($request["getDatosContratos"])) {

    $a = new DashBoardApi();
    $a -> getDatosContratosModelApi();

}