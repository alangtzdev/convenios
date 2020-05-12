<?php 
require "../models/usuariosModel.php";
 class UsuariosApi
 {
     public function getUsuarios()
     {
        $response = UsuariosModel::getUsuariosMdl("usuarios");
        echo json_encode($response);
     }

 }
 
$request = json_decode(file_get_contents('php://input'), true);
// var_dump($request);
if(isset($request["getUsuarios"])){
    $a = new UsuariosApi ();
    $a -> getUsuarios();
}