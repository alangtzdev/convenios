<?php 
require_once "../models/conveniosModel.php";

class ConveniosApi
{

    public function getConveniosApi()
    {
        $response = ConveniosModel::getConveniosMdl('convenios');
        echo json_encode($response);
    }
    public function saveConvenio($arrDatos)
    {
        $response = ConveniosModel::saveConvenioMdl($arrDatos,"convenios");
        echo json_encode($response);
    }
    public function deleteConvenio($idConvenio)
    {
        $response = ConveniosModel::deleteConvenioMdl($idConvenio,'convenios');
        echo $response != "success" ? $response : json_encode($response); 
    }


}
//Obtenemos peticion

$request = json_decode(file_get_contents('php://input'), true);
$file = file_get_contents('php://input');


// Dependiendo la peticion que recibamos realiza diferente accion

if(isset($_POST["getConvenios"])){

    $b = new ConveniosApi();
    $b -> getConveniosApi();

} else if(isset($request["saveConvenio"])) {

    $a = new ConveniosApi();
    $a -> saveConvenio($request["saveConvenio"]);

}else if (isset($request["deleteConvenio"])) {

    $c = new ConveniosApi();
    $c -> deleteConvenio($request['deleteConvenio']['idConvenio']);

} else {

    // $d = new ConveniosApi();
    // $d -> getCategoriasArea($_POST["getCategoriasArea"]["idArea"]);    
    
} 
