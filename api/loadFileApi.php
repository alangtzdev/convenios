<?php
require_once "../models/loadFileModel.php";

class LoadFileApi
{
    function subirArchivo($arrayDatos) {
        $nombreEncriptado = md5($arrayDatos['name']);
        $info = new SplFileInfo($arrayDatos['name']);
        $ext = $info->getExtension();
        $ruta = "../storage/".$nombreEncriptado.".".$ext;
        move_uploaded_file($arrayDatos['tmp_name'],$ruta);

        $response = LoadFileModel::upLoadFileMdl($nombreEncriptado,$ruta,"convenios");
        echo json_encode($response);
    }
}
if (isset($_FILES['archivoNuevo'])) {
    $a = new LoadFileApi();
    $a -> subirArchivo($_FILES['archivoNuevo']);
}