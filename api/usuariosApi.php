<?php 
require "../models/usuariosModel.php";
 class UsuariosApi
 {
     public function getUsuarios()
     {
        $response = UsuariosModel::getUsuariosMdl("usuarios");
        echo json_encode($response);
     }
     public function saveUsuario($arrDatos)
     {
        $response = UsuariosModel::saveUsuarioMdl($arrDatos,"usuarios");
        echo json_encode($response);
     }

     public function deleteUsuario($idUsuario)
     {
        $response = UsuariosModel::deleteUsuarioMdl($idUsuario,"usuarios");
        echo $response != "success" ? $response : json_encode($response);
     }

 }
 
$request = json_decode(file_get_contents('php://input'), true);

if(isset($request["getUsuarios"])){
    $a = new UsuariosApi ();
    $a -> getUsuarios();
} else if (isset($request["saveUsuario"])) {

    $c = new UsuariosApi ();
    $c -> saveUsuario($request['saveUsuario']);

} else if (isset($request["deleteUsuario"])) {

    $c = new UsuariosApi ();
    $c -> deleteUsuario($request['deleteUsuario']['idUsuario']);
    
}