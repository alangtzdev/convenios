<?php 
require "../models/permisosModel.php";
 class PermisosApi
 {
     public function getPermisos()
     {
        $response = PermisosModel::getPermisosMdl("permisos");
        echo json_encode($response);
     }

     public function savePermiso($arrDatos)
     {
        $response = PermisosModel::savePermisoMdl($arrDatos,"permisos");
        echo json_encode($response);
     }

     public function deletePermiso($idPermiso)
     {
        $response = PermisosModel::deletePermisoMdl($idPermiso,"permisos");
        echo $response != "success" ? $response : json_encode($response);
     }

 }
 
$request = json_decode(file_get_contents('php://input'), true);
// var_dump($request);
if(isset($request["getPermisos"])){
    $a = new PermisosApi ();
    $a -> getPermisos();

}  else if (isset($request["savePermiso"])) {

    $c = new PermisosApi ();
    $c -> savePermiso($request['savePermiso']);

} else if (isset($request["deletePermiso"])) {

    $c = new PermisosApi ();
    $c -> deletePermiso($request['deletePermiso']['idPermiso']);
    
}