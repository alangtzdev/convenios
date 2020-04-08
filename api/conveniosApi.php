<?php 
require_once "../models/conveniosModel.php";

class ConveniosApi
{
    public function saveArchivo($arrDatos)
    {
        $response = ArchivoModel::saveArchivo($arrDatos,"archivos");
        echo json_encode($response);
    }
    public function getAreasUsuario($idUsuario)
    {
        $response = ArchivoModel::getAreasUsuario($idUsuario,"areas_usuarios");
        echo json_encode($response);  
    }
    public function getArchivos($idUsuario,$idArea,$idCategoria)
    {
        $response = ArchivoModel::getArchivos($idUsuario,$idArea,$idCategoria,"archivos");
        echo json_encode($response);
    }
    public function getConveniosApi()
    {
        $response = ConveniosModel::getConveniosModel('convenios');
        echo json_encode($response);
    }
    public function deleteArchivo($idArchivo)
    {
        $response = ArchivoModel::deleteArchivoModel($idArchivo,"archivos");
        echo $response != "success" ? $response : json_encode($response); 
    }


}

if(isset($_POST["saveArchivo"])) {
    $a = new ArchivoController();
    $a -> saveArchivo( $_POST["saveArchivo"]);
} else if(isset($_POST["getConvenios"])){
    $b = new ConveniosApi();
    $b -> getConveniosApi();
} else if (isset($_POST["getArchivos"])) {
    $c = new ArchivoController();
    $c -> getArchivos($_POST["getArchivos"]["idUsuario"],$_POST["getArchivos"]["idArea"],$_POST["getArchivos"]["idCategoria"]);
} else if (isset($_POST["getCategoriasArea"])){
    $d = new ArchivoController();
    $d -> getCategoriasArea($_POST["getCategoriasArea"]["idArea"]);    
} elseif (isset($_POST['deleteArchivo'])) {
    $e = new ArchivoController();
    $e -> deleteArchivo($_POST['deleteArchivo']['idArchivo']);
}
