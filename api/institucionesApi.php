<?php 
require "../models/institucionesModel.php";
 class InstitucionesApi
 {
     public function getInstituciones()
     {
        $response = InstitucionesModel::getInstitucionesMdl("instituciones");
        echo json_encode($response);
     }

     public function saveInstitucion($arrDatos)
     {
        $response = InstitucionesModel::saveInstitucionMdl($arrDatos,"instituciones");
        echo json_encode($response);
     }

     public function deleteInstitucion($idInstitucion)
     {
        $response = InstitucionesModel::deleteInstitucionMdl($idInstitucion,"instituciones");
        echo $response != "success" ? $response : json_encode($response);
     }

 }
 
$request = json_decode(file_get_contents('php://input'), true);
// var_dump($request);
if(isset($request["getInstituciones"])){
    $a = new InstitucionesApi ();
    $a -> getInstituciones();

}  else if (isset($request["saveInstitucion"])) {

    $c = new InstitucionesApi ();
    $c -> saveInstitucion($request['saveInstitucion']);

} else if (isset($request["deleteInstitucion"])) {

    $c = new InstitucionesApi ();
    $c -> deleteInstitucion($request['deleteInstitucion']['idInstitucion']);
    
}