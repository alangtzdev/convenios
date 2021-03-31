<?php 
require "../models/modulosModel.php";
 class ModulosApi
 {
     public function getModulos()
     {
        $response = ModulosModel::getModulosMdl("modulos");
        echo json_encode($response);
     }
     public function saveModulo($arrDatos)
     {
        $response = ModulosModel::saveModuloMdl($arrDatos,"modulos");
        echo json_encode($response);
     }

     public function deleteModulo($idModulo)
     {
        $response = ModulosModel::deleteModuloMdl($idModulo,"modulos");
        echo $response != "success" ? $response : json_encode($response);
     }

 }
 
$request = json_decode(file_get_contents('php://input'), true);
// var_dump($request);
if(isset($request["getModulos"])){
    $a = new ModulosApi ();
    $a -> getModulos();

}  else if (isset($request["saveModulo"])) {

    $c = new ModulosApi ();
    $c -> saveModulo($request['saveModulo']);

} else if (isset($request["deleteModulo"])) {

    $c = new ModulosApi ();
    $c -> deleteModulo($request['deleteModulo']['idModulo']);
    
}