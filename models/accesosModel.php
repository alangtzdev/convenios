<?php 
require_once "../include/config.php";

class AccesosModel extends Conexion
{
    // -------------------------------------------------------------------------------------------
    public static function getAccesosMdl($table)
    {
        try {
            $cxn = Conexion::conectar();
            $arrayResult = array();
            $stmt = $cxn->prepare("SELECT * FROM $table");
            $exeResult = $stmt->execute();
            if ($exeResult) {

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                    $arrayResult[] = array('idAcceso' => $row['idAcceso'],
                        'nombre' => $row['nombre'],
                        'abreviacion' => $row['abreviacion'] == null ? '' : $row['abreviacion'] );
                }

                return $arrayResult;
            } else {
                return "No se pudieron obterner los datos";
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        # code...
    }
    // -------------------------------------------------------------------------------------------
    public static function saveAccesoMdl($arrDatos,$table)
    {
      try {
         $today = date("Y-m-d H:i:s");

         if ($arrDatos['HFCommandName'] == 'ALTA' && $arrDatos['idAcceso'] == "") {
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
         } else if ($arrDatos['HFCommandName'] == 'EDITAR' && $arrDatos['idAcceso'] != ""){

            $stmt = Conexion::conectar()->prepare("UPDATE  $table SET nombre = :nombre, abreviacion = :abreviacion 
            WHERE idAcceso = :idAcceso");

            $stmt->bindParam(":idAcceso", $arrDatos['idAcceso'], PDO::PARAM_INT);
            $stmt->bindParam(":nombre",$arrDatos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(":abreviacion",$arrDatos['abreviacion'], PDO::PARAM_STR);
            if ($stmt->execute()) {
                return "success";
            } else {
                return "Hubo un error al editar la acceso" .nombre;
            }
            $stmt->close();
         } else {
            return "Hubo un problema: " + $arrDatos['HFCommandName'] + ", " + $arrDatos['idAcceso'];
         }
      } catch (Exception $th) {
         return $th->getMessage();
      }
    }

    public static function deleteAccesoMdl($idAcceso,$table)
    {
      try {
         $stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE idAcceso = :id");
         $stmt->bindParam(":id", $idAcceso, PDO::PARAM_INT);
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