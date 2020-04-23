<?php 
require_once "../models/contratosModel.php";

class ContratosApi
{

    public function getContratosApi()
    {
        $response = ContratosModel::getContratosMdl('contratos');
        echo json_encode($response);
    }
    public function saveContrato($arrDatos)
    {
        $response = ContratosModel::saveContratoMdl($arrDatos,"contratos");
        echo json_encode($response);
    }
    public function deleteContrato($idContrato)
    {
        $response = ContratosModel::deleteContratoMdl($idContrato,'contratos');
        echo $response != "success" ? $response : json_encode($response); 
    }


}
//Obtenemos peticion

$request = json_decode(file_get_contents('php://input'), true);

// Dependiendo la peticion que recibamos realiza diferente accion

if(isset($_POST["getContratos"])){

    $b = new ContratosApi();
    $b -> getContratosApi();

} else if(isset($request["saveContrato"])) {

    $a = new ContratosApi();
    $a -> saveContrato($request["saveContrato"]);

}else if (isset($request["deleteContrato"])) {

    $c = new ContratosApi();
    $c -> deleteContrato($request['deleteContrato']['idContrato']);

} else {

    // $d = new ContratosApi();
    // $d -> getCategoriasArea($_POST["getCategoriasArea"]["idArea"]);    
    
} 
