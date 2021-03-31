<?php 
require_once "../include/config.php";

class PermisosModel extends Conexion
{
    // -------------------------------------------------------------------------------------------
    public static function getPermisosMdl($table)
    {
        try {
            $cxn = Conexion::conectar();
            $arrayResult = array();
            $stmt = $cxn->prepare("SELECT * FROM $table");
            $exeResult = $stmt->execute();
            $arrayResult = $stmt->fetchAll();
            return $arrayResult;

        } catch (Throwable $th) {
            return $th->getMessage();
        }
        # code...
    }
    // -------------------------------------------------------------------------------------------
    public static function savePermisoMdl($arrDatos,$table)
    {
      try {
         $today = date("Y-m-d H:i:s");

         if ($arrDatos['HFCommandName'] == 'ALTA' && $arrDatos['idPermiso'] == "") {
             $stmt = Conexion::conectar()->prepare("INSERT INTO $table (nombre, abreviacion) 
             VALUES (:nombre, :abreviacion)");
            $stmt->bindParam(":nombre",$arrDatos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(":abreviacion",$arrDatos['abreviacion'], PDO::PARAM_STR);
            if ($stmt->execute()) {
               return "success";
           } else {
               return "Error";
           }
           $stmt->close();
         } else if ($arrDatos['HFCommandName'] == 'EDITAR' && $arrDatos['idPermiso'] != ""){

            $stmt = Conexion::conectar()->prepare("UPDATE  $table SET nombre = :nombre, abreviacion = :abreviacion 
            WHERE idPermiso = :idPermiso");

            $stmt->bindParam(":idPermiso", $arrDatos['idPermiso'], PDO::PARAM_INT);
            $stmt->bindParam(":nombre",$arrDatos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(":abreviacion",$arrDatos['abreviacion'], PDO::PARAM_STR);
            if ($stmt->execute()) {
                return "success";
            } else {
                return "Hubo un error al editar la institucion" .nombre;
            }
            $stmt->close();
         } else {
            return "Hubo un problema: " + $arrDatos['HFCommandName'] + ", " + $arrDatos['idPermiso'];
         }
      } catch (Exception $th) {
         return $th->getMessage();
      }
    }

    public static function deletePermisoMdl($idPermiso,$table)
    {
      try {
         $stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE idPermiso = :id");
         $stmt->bindParam(":id", $idPermiso, PDO::PARAM_INT);
         if($stmt->execute()){
            return "success";
         }
         else{
            return "No se pudo eliminar el catalogo";
         }
         $stmt->close();
      } catch (Throwable $th) {
         return $th->getMessage();
      }
      
    }
    
}