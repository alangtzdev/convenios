<?php 
require_once "../include/config.php";

class InstitucionesModel extends Conexion
{
    // -------------------------------------------------------------------------------------------
    public static function getInstitucionesMdl($table)
    {
        try {
            // $cxn = Conexion::conectar();
            $arrayResult = array();
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $table");
            $exeResult = $stmt->execute();
            if ($exeResult) {

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                    $arrayResult[] = array('idInstitucion' => $row['idInstitucion'],
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
    public static function saveInstitucionMdl($arrDatos,$table)
    {
      try {
         $today = date("Y-m-d H:i:s");

         if ($arrDatos['HFCommandName'] == 'ALTA' && $arrDatos['idInstitucion'] == "") {
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
         } else if ($arrDatos['HFCommandName'] == 'EDITAR' && $arrDatos['idInstitucion'] != ""){

            $stmt = Conexion::conectar()->prepare("UPDATE  $table SET nombre = :nombre, abreviacion = :abreviacion 
            WHERE idInstitucion = :idInstitucion");

            $stmt->bindParam(":idInstitucion", $arrDatos['idInstitucion'], PDO::PARAM_INT);
            $stmt->bindParam(":nombre",$arrDatos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(":abreviacion",$arrDatos['abreviacion'], PDO::PARAM_STR);
            if ($stmt->execute()) {
                return "success";
            } else {
                return "Hubo un error al editar la institucion" .nombre;
            }
            $stmt->close();
         } else {
            return "Hubo un problema: " + $arrDatos['HFCommandName'] + ", " + $arrDatos['idInstitucion'];
         }
      } catch (Exception $th) {
         return $th->getMessage();
      }
    }

    public static function deleteInstitucionMdl($idInstitucion,$table)
    {
      try {
         $stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE idInstitucion = :id");
         $stmt->bindParam(":id", $idInstitucion, PDO::PARAM_INT);
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