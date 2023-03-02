<?php
require "../models/modulosRolModel.php";



class ModulosRolAPi
{
    public static function getModulosRol($idRol)
    {
        $response = ModulosRolModel::getModulosRolMdl($idRol, "modulos_rol");
        echo json_encode($response);
    }
}
$request = json_decode(file_get_contents('php://input'), true);
// var_dump($request);
if (isset($request["getModulosRol"])) {
    $a = new ModulosRolAPi();
    $a->getModulosRol($request['getModulosRol']['idRol']);
    // var_dump($request['getModulosRol']['idRol']);
}
