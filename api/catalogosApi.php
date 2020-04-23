<?php 
require "../models/catalogosModel.php";
 class CatalogosApi
 {
     public function getCatxTipo($tipoCatalogo){
         $response = CatalogosModel::getCatxTipoModel($tipoCatalogo, "catalogos");
         echo json_encode($response);
     }

     public function getCatalogos()
     {
        $response = CatalogosModel::getCatalogosModel("catalogos");
        echo json_encode($response);
     }

 }
 
$request = json_decode(file_get_contents('php://input'), true);
// var_dump($request);
if(isset($request["getCatalogos"])){
    $a = new CatalogosApi ();
    $a -> getCatalogos();
}