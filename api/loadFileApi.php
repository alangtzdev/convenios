<?php
require_once "../models/loadFileModel.php";

class LoadFileApi
{
    function subirArchivo($arrayDatos) {
        $response = LoadFileModel::upLoadFileMdl($arrayDatos);
        echo is_string($response) ? $response : json_encode($response); 
    }
}
if (isset($_FILES['archivoNuevo'])) {
    $a = new LoadFileApi();
    $a -> subirArchivo($_FILES['archivoNuevo']);
    // var_dump($_FILES['archivoNuevo']);
}