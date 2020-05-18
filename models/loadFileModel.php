<?php
require_once "../include/config.php";

class LoadFileModel extends Conexion
{
    public function upLoadFileMdl($nombreEncriptado,$ruta,$table)
   {

    try {
       $pdo = Conexion::conectar();
        $stmt = $pdo->prepare("INSERT INTO $table(encrypArchivo, rutaArchivo) VALUES (:encrypNomArchivo, :ruta)");
        $stmt->bindParam(":encrypNomArchivo",$nombreEncriptado, PDO::PARAM_STR);
        $stmt->bindParam(":ruta",$ruta, PDO::PARAM_STR);
        if($stmt->execute()) {
          $id = $pdo->lastInsertId();
          return intval($id);
        } else{
          return "Error no se pudo guardar el archivo";   
        }
       $stmt->close();
    } catch (Exception $th) {
       throw $th;
    }

 }
}


?>