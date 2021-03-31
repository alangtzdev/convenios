<?php 
require "../models/usuariosModel.php";
require "sesionesApi.php";

 class UsuariosApi
 {
     public function getLogin($arrDatos) 
     {
        $response = UsuariosModel::getUsuarioMdl($arrDatos,"usuarios");
        // var_dump($response);
        if (array_key_exists('code',$response)) {
           echo json_encode($response);
        } else {
            // var_dump($response);
            echo json_encode($response);
            Sessiones::iniciarSesionLogin($response[0]['correo'],$response[0]['idUsuario'],$response[0]['idRol']);
            // $_SESSION['sessionStart']  = $response[0]['nombre'];
        }
     }
     public function getPerfil($email)
     {
        $response = UsuariosModel::getPerfilMdl($email,"usuarios");
        echo json_encode($response);
     }
     public function getUsuarios()
     {
        $response = UsuariosModel::getUsuariosMdl("usuarios");
        echo json_encode($response);
     }
     public function actualizarPerfil($arrDatos)
     {
         $response = UsuariosModel::actualizarPerfilMdl($arrDatos,"usuarios");
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

if(isset($request["getLogin"])){
    $a = new UsuariosApi ();
    $a -> getLogin($request['getLogin']);
}
else if(isset($request["getUsuarios"])){
    $b = new UsuariosApi ();
    $b -> getUsuarios();
}
else if(isset($request["getPerfil"])){
    $c = new UsuariosApi ();
    $c -> getPerfil($request["getPerfil"]['userEmail']);
}else if (isset($request["actualizarPerfil"])) {

    $d = new UsuariosApi ();
    $d -> actualizarPerfil($request['actualizarPerfil']);

}else if (isset($request["saveUsuario"])) {

    $e = new UsuariosApi ();
    $e -> saveUsuario($request['saveUsuario']);

} else if (isset($request["deleteUsuario"])) {

    $f = new UsuariosApi ();
    $f -> deleteUsuario($request['deleteUsuario']['idUsuario']);
    
}