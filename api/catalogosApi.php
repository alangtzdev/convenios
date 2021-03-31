<?php 
require "../models/catalogosModel.php";
 class CatalogosApi
 {
     public function getCatalogos()
     {
        $response = CatalogosModel::getCatalogosModel("catalogos");
        echo json_encode($response);
     }
     
     public function getTiposCat()
     {
        $response = CatalogosModel::getTiposCatalogosMdl("tipocatalogos");
        echo json_encode($response);
     }

     public function saveCatalogo($arrDatos)
     {
        $response = CatalogosModel::saveCatalogoMdl($arrDatos,"catalogos");
        echo json_encode($response);
     }

     public function deleteCatalogo($idCatalogo)
     {
        $response = CatalogosModel::deleteCatalogoMdl($idCatalogo,"catalogos");
        echo $response != "success" ? $response : json_encode($response);
     }


 }
 
$request = json_decode(file_get_contents('php://input'), true);
// var_dump($request);
if(isset($request["getCatalogos"])){

    $a = new CatalogosApi ();
    $a -> getCatalogos();

} else if (isset($request["getTiposCatalogos"])) {

    $b = new CatalogosApi ();
    $b -> getTiposCat();

} else if (isset($request["saveCatalogo"])) {

    $c = new CatalogosApi ();
    $c -> saveCatalogo($request['saveCatalogo']);

} else if (isset($request["deleteCatalogo"])) {
    $c = new CatalogosApi ();
    $c -> deleteCatalogo($request['deleteCatalogo']['idCatalogo']);
}