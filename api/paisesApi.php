<?php
require "../models/paisesModel.php";
class PaisesApi
{
    public function getPaises()
    {
        $response = PaisesModel::getPaisesMdl("paises");
        echo json_encode($response);
    }
}

$request = json_decode(file_get_contents('php://input'), true);
// var_dump($request);
if (isset($request["getPaises"])) {
    $a = new PaisesApi();
    $a->getPaises();
}
