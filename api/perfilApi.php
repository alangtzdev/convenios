<?php
require_once "../models/perfilModel.php";

class PerfilApi
{
    public function getUsuario()
    {
        $response = PerfilModel::getPerfilModel("usuarios");
        echo json_encode($response);  
    }
    public function editPerfil($arrPerfil)
    {
        $response = PerfilModel::editPerfilModel($arrPerfil,"usuarios");
        echo $response != "success" ? $response : json_encode($response); 
    }


}

if(isset($_POST["submitForm"])) {
    # code...
} else if(isset($_POST["getPerfil"])){
    $b = new PerfilApi();
    $b -> getUsuario();
} elseif (isset($_POST["editPerfil"])) {
    $c = new PerfilApi();
    $c -> editPerfil($_POST["editPerfil"]);
}
