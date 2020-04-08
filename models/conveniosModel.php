<?php
require_once "../include/config.php";
require_once "globlalFuncModel.php";

class ConveniosModel extends Conexion
{
    public function getConveniosModel($table)
    {
        try {
            $arrayResult = array();
            $stmt = Conexion::conectar()->prepare("SELECT idConvenio, nombre, descripcion, fechaCreacion, fechaInicio, fechaFin, isIndefinida  FROM $table");
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $arrayResult[] = array('idConvenio' => $row['idConvenio'],
                    'nombre' => $row['nombre'],
                    'descripcion' => $row['descripcion'],
                    'fechaCreacion' => $row['fechaCreacion'],
                    'fechaInicio' => $row['fechaInicio'],
                    'fechaFin' => $row['fechaFin'],
                    'isIndefinida' => $row['isIndefinida']
                );
            }
            
            return $arrayResult;

        } catch (Exception $th) {
            return $th->getMessage();
        }
    }
   public function saveConvenio($arrDatos,$table)
   {

      try {
         $today = date("Y-m-d H:i:s");
         $isPublic = 0;
         $stmt = Conexion::conectar()->prepare("UPDATE $table SET nombreConvenio = :nombre, descripcion = :descripcion, fechaCreacion = :fecha, id_usuario = :idUsuario, id_area = :idArea, id_categoria = :idCategoria, is_publico = :isPublico  WHERE id = :idConvenio");
          $stmt->bindParam(":idConvenio", $arrDatos['idConvenio'], PDO::PARAM_INT);

          $stmt->bindParam(":nombre", $arrDatos['nombreConvenio'], PDO::PARAM_STR);

          $stmt->bindParam(":descripcion", $arrDatos['descripcion'], PDO::PARAM_STR);

          $stmt->bindParam(":fecha", $today,PDO::PARAM_STR);

          $stmt->bindParam(":idUsuario", $arrDatos['idUsuario'], PDO::PARAM_STR);

          $stmt->bindParam(":idArea", $arrDatos['idArea'], PDO::PARAM_STR);

          $stmt->bindParam(":idCategoria", $arrDatos['idCategoria'], PDO::PARAM_STR);

          $stmt->bindParam(":isPublico", $isPublic, PDO::PARAM_INT);

          if($stmt->execute()) {
            return "success";
          } else{
            return "Error";   
         }
         $stmt->close();
      } catch (Exception $th) {
         return  $th->getMessage();
      }
   }
   public function getAreasUsuario($idUsuario,$table)
   {
      try {
         $jsonArray = array();
         $stmt = Conexion::conectar()->prepare("SELECT id, nombreArea FROM areas WHERE id IN (SELECT id_area FROM $table WHERE id_usuario = :id)");
         $stmt->bindParam(":id",$idUsuario, PDO::PARAM_INT);
         $stmt->execute();
         while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $jsonArray[] = array('idArea' => $row['id'],
         'nombreArea' => $row['nombreArea']);
         }
         $jsonParse = GlobalFunctModel::utf8Size($jsonArray);
         return $jsonParse;
        } catch (Exception $th) {
        die($th->getMessage());
      }
   }
   /**----------------------------**/

   public function getCategoriasArea($idArea,$table)
   {
      try {
         $jsonArray = array();
         $stmt = Conexion::conectar()->prepare("SELECT id, nombreCategoria, descripcion FROM $table WHERE id_area = :id");
         $stmt->bindParam(":id",$idArea, PDO::PARAM_INT);
         $stmt->execute();
         if ($stmt->rowCount() > 0) { 
            // var_dump(count($stmt->fetchAll()));
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
               $jsonArray[] = array('id' => $row['id'],
            'nombreCategoria' => $row['nombreCategoria']);
            }
            return $jsonArray;
         } else {
            throw new Exception("No se encuentran categorias para esta Area");
         }
        
      } catch (\Throwable $th) {
         return $th->getMessage();
      }
   }
   public function subirConvenio($nombreEncriptado,$ruta,$table)
   {
      try {
         $pdo = Conexion::conectar();
          $stmt = $pdo->prepare("INSERT INTO $table(encrypConvenio, rutaConvenio) VALUES (:encrypNomConvenio, :ruta)");
          $stmt->bindParam(":encrypNomConvenio",$nombreEncriptado, PDO::PARAM_STR);
          $stmt->bindParam(":ruta",$ruta, PDO::PARAM_STR);
          if($stmt->execute()) {
            $id = $pdo->lastInsertId();
            return intval($id);
          } else{
            return "Error no se pudo guardar el archivo";   
          }
         $stmt->close();
      } catch (Exception $th) {
         //throw $th;
      }
   }
   public function deleteConvenioModel($idConvenio,$table)
   {
      try {
         $stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE id = :id");
         $stmt->bindParam(":id", $idConvenio, PDO::PARAM_INT);
         if($stmt->execute()){
            return "success";
         }
         else{
            return "No se pudo eliminar el archivo";
         }
         $stmt->close();
      } catch (\Throwable $th) {
         return $th->getMessage();
      }
      
   }
}