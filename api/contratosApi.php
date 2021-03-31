<?php 
require_once "../models/contratosModel.php";

class ContratosApi
{

    public function getContratosApi()
    {
        $response = ContratosModel::getContratosMdl('contratos');
        echo json_encode($response);
    }
    public function saveContrato($arrDatos,$username)
    {
        $response = ContratosModel::saveContratoMdl($arrDatos,"contratos",$username);
        echo json_encode($response);
    }
    public function deleteContrato($idContrato,$username)
    {
        $response = ContratosModel::deleteContratoMdl($idContrato,'contratos',$username);
        echo $response != "success" ? $response : json_encode($response); 
    }


}
//Obtenemos peticion

$request = json_decode(file_get_contents('php://input'), true);
session_start();
$username = $_SESSION['username'];

// Dependiendo la peticion que recibamos realiza diferente accion

if(isset($_POST["getContratos"])){

    $b = new ContratosApi();
    $b -> getContratosApi();

} else if(isset($request["saveContrato"])) {

    $a = new ContratosApi();
    $a -> saveContrato($request["saveContrato"],$username);

}else if (isset($request["deleteContrato"])) {

    $c = new ContratosApi();
    $c -> deleteContrato($request['deleteContrato']['idContrato'],$username);

} else {

    // $d = new ContratosApi();
    // $d -> getCategoriasArea($_POST["getCategoriasArea"]["idArea"]);    
    
} 
