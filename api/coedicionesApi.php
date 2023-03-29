<?php 
require_once "../models/coedicionesModel.php";

class CoedicionesApi
{

    public function getCoedicionesApi()
    {
        $response = CoedicionesModel::getCoedicionesMdl('coediciones');
        echo json_encode($response);
    }
    public function saveCoedicion($arrDatos,$username)
    {
        $response = CoedicionesModel::saveCoedicionMdl($arrDatos,"coediciones", $username);
        echo json_encode($response);
    }
    public function deleteCoedicion($idCoedicion,$username)
    {
        $response = CoedicionesModel::deleteCoedicionMdl($idCoedicion,'coediciones', $username);
        echo $response != "success" ? $response : json_encode($response); 
    }


}
//Obtenemos peticion

$request = json_decode(file_get_contents('php://input'), true);
$file = file_get_contents('php://input');
session_start();
$username = $_SESSION['username'];


// Dependiendo la peticion que recibamos realiza diferente accion

if(isset($_POST["getCoediciones"])){

    $b = new CoedicionesApi();
    $b -> getCoedicionesApi();

} else if(isset($request["saveCoedicion"])) {

    $a = new CoedicionesApi();
    $a -> saveCoedicion($request["saveCoedicion"],$username);

}else if (isset($request["deleteCoedicion"])) {

    $c = new CoedicionesApi();
    $c -> deleteCoedicion($request['deleteCoedicion']['idCoedicion'],$username);

} else {

    // $d = new CoedicionesApi();
    // $d -> getCategoriasArea($_POST["getCategoriasArea"]["idArea"]);    
    
} 
