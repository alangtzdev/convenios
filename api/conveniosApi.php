<?php 
require_once "../models/conveniosModel.php";

class ConveniosApi
{

    public function getConveniosApi()
    {
        $response = ConveniosModel::getConveniosMdl('convenios');
        echo json_encode($response);
    }
    public function saveConvenio($arrDatos,$username)
    {
        $response = ConveniosModel::saveConvenioMdl($arrDatos,"convenios", $username);
        echo json_encode($response);
    }
    public function deleteConvenio($idConvenio,$username)
    {
        $response = ConveniosModel::deleteConvenioMdl($idConvenio,'convenios', $username);
        echo $response != "success" ? $response : json_encode($response); 
    }


}
//Obtenemos peticion

$request = json_decode(file_get_contents('php://input'), true);
$file = file_get_contents('php://input');
session_start();
$username = $_SESSION['username'];


// Dependiendo la peticion que recibamos realiza diferente accion

if(isset($_POST["getConvenios"])){

    $b = new ConveniosApi();
    $b -> getConveniosApi();

} else if(isset($request["saveConvenio"])) {

    $a = new ConveniosApi();
    $a -> saveConvenio($request["saveConvenio"],$username);

}else if (isset($request["deleteConvenio"])) {

    $c = new ConveniosApi();
    $c -> deleteConvenio($request['deleteConvenio']['idConvenio'],$username);

} else {

    // $d = new ConveniosApi();
    // $d -> getCategoriasArea($_POST["getCategoriasArea"]["idArea"]);    
    
} 
