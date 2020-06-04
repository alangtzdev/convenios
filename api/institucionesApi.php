<?php 
require "../models/institucionesModel.php";
 class InstitucionesApi
 {
     public function getInstituciones()
     {
        $response = InstitucionesModel::getInstitucionesMdl("instituciones");
        echo json_encode($response);
     }

 }
 
$request = json_decode(file_get_contents('php://input'), true);
// var_dump($request);
if(isset($request["getInstituciones"])){
    $a = new InstitucionesApi ();
    $a -> getInstituciones();
}