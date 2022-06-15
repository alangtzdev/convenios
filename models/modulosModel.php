<?php 
require_once "../include/config.php";

class ModulosModel extends Conexion
{
    // -------------------------------------------------------------------------------------------
    public static function getModulosMdl($table)
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
    public static function saveModuloMdl($arrDatos,$table)
    {
      try {
         $today = date("Y-m-d H:i:s");

         if ($arrDatos['HFCommandName'] == 'ALTA' && $arrDatos['idModulo'] == "") {
             $stmt = Conexion::conectar()->prepare("INSERT INTO $table (nombre, modulo) 
             VALUES (:nombre, :modulo)");
            $stmt->bindParam(":nombre",$arrDatos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(":modulo",$arrDatos['modulo'], PDO::PARAM_STR);
            if ($stmt->execute()) {
               return "success";
           } else {
               return "Error";
           }
           $stmt->close();
         } else if ($arrDatos['HFCommandName'] == 'EDITAR' && $arrDatos['idModulo'] != ""){

            $stmt = Conexion::conectar()->prepare("UPDATE  $table SET nombre = :nombre, modulo = :modulo 
            WHERE idModulo = :idModulo");

            $stmt->bindParam(":idModulo", $arrDatos['idModulo'], PDO::PARAM_INT);
            $stmt->bindParam(":nombre",$arrDatos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(":modulo",$arrDatos['modulo'], PDO::PARAM_STR);
            if ($stmt->execute()) {
                return "success";
            } else {
                return "Hubo un error al editar el Modulo" .$arrDatos['nombre'];
            }
            $stmt->close();
         } else {
            return "Hubo un problema: " + $arrDatos['HFCommandName'] + ", " + $arrDatos['idModulo'];
         }
      } catch (Exception $th) {
         return $th->getMessage();
      }
    }

    public static function deleteModuloMdl($idModulo,$table)
    {
      try {
         $stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE idModulo = :id");
         $stmt->bindParam(":id", $idModulo, PDO::PARAM_INT);
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