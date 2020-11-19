<?php 
require "../models/rolesModel.php";
 class RolesApi
 {
     public function getRoles()
     {
        $response = RolesModel::getRolesMdl("roles");
        echo json_encode($response);
     }
     public function saveRol($arrDatos)
     {
        $response = RolesModel::saveRolMdl($arrDatos,"roles");
        echo json_encode($response);
     }

     public function deleteRol($idRol)
     {
        $response = RolesModel::deleteRolMdl($idRol,"roles");
        echo $response != "success" ? $response : json_encode($response);
     }

 }
 
$request = json_decode(file_get_contents('php://input'), true);
// var_dump($request);
if(isset($request["getRoles"])){
    $a = new RolesApi ();
    $a -> getRoles();
}  else if (isset($request["saveRol"])) {

    $b = new RolesApi ();
    $b -> saveRol($request['saveRol']);

} else if (isset($request["deleteRol"])) {

    $c = new RolesApi ();
    $c -> deleteRol($request['deleteRol']['idRol']);
    
}