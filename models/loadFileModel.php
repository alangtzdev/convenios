<?php
require_once "../include/config.php";

class LoadFileModel extends Conexion
{
//     public function upLoadFileMdl($arrDatos)
//    {

//     try {
//        $pdo = Conexion::conectar();
//         $stmt = $pdo->prepare("INSERT INTO $table(encrypArchivo, rutaArchivo) VALUES (:encrypNomArchivo, :ruta)");
//         $stmt->bindParam(":encrypNomArchivo",$nombreEncriptado, PDO::PARAM_STR);
//         $stmt->bindParam(":ruta",$ruta, PDO::PARAM_STR);
//         if($stmt->execute()) {
//           $id = $pdo->lastInsertId();
//           return intval($id);
//         } else{
//           return "Error no se pudo guardar el archivo";   
//         }
//        $stmt->close();
//     } catch (Exception $th) {
//        throw $th;
//     }

//  }

    public static function upLoadFileMdl($arrayDatos)
    {
      try {

         $arrayResult = array();

         $nombreEncriptado = md5($arrayDatos['name']);
         $info = new SplFileInfo($arrayDatos['name']);
         $ext = $info->getExtension();
         $rutaStorage = "../storage/".$nombreEncriptado.".".$ext;
         $rutaDB = "./storage/".$nombreEncriptado.".".$ext;
         move_uploaded_file($arrayDatos['tmp_name'],$rutaStorage);
         // $myobj->encrypArchivo = $nombreEncriptado;
         // $myobj->rutaArchivo = $ruta;
         $arrayResult = array('encrypArchivo' => $nombreEncriptado, 'rutaArchivo' => $rutaDB);
         if (!empty($arrayResult)) {
            return $arrayResult;
         } else {
            throw new Exception("No se pudo guardar el arhvo");
         }

    } catch (Exception $th) {
       throw $th;
    }
   }

   public function upLoadFileFinaciero($arrayDatos) {
      try {
         //code...
      } catch (Throwable $th) {
         //throw $th;
      }
   }
   public function upLoadFileTecnico($arrayDatos) {
      try {
         //code...
      } catch (Throwable $th) {
         //throw $th;
      }
   }

}


?>