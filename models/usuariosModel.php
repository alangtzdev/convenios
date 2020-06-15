<?php 
require_once "../include/config.php";

class UsuariosModel extends Conexion
{
    // -------------------------------------------------------------------------------------------
    public function getUsuariosMdl($table)
    {
        try {
            $cxn = Conexion::conectar();
            $arrayResult = array();
            $stmt = $cxn->prepare("SELECT * FROM $table");
            $exeResult = $stmt->execute();
            if ($exeResult) {

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                    $arrayResult[] = array('idUsuario' => $row['idUsuario'],
                        'nombre' => $row['nombre'],
                        'apellido' => $row['apellido']);
                }

                return $arrayResult;
            } else {
                return "No se pudieron obterner los datos";
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    // -------------------------------------------------------------------------------------------
    public function saveUsuarioMdl($arrDatos,$table)
    {
      try {
         $today = date("Y-m-d H:i:s");

         if ($arrDatos['HFCommandName'] == 'ALTA' && $arrDatos['idUsuario'] == "") {
             $stmt = Conexion::conectar()->prepare("INSERT INTO $table (nombre, apellido) 
             VALUES (:nombre, :apellido)");
            $stmt->bindParam(":nombre",$arrDatos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(":apellido",$arrDatos['apellido'], PDO::PARAM_STR);
            if ($stmt->execute()) {
               return "success";
           } else {
               return "Error";
           }
           $stmt->close();
         } else if ($arrDatos['HFCommandName'] == 'EDITAR' && $arrDatos['idUsuario'] != ""){

            $stmt = Conexion::conectar()->prepare("UPDATE  $table SET nombre = :nombre, apellido = :apellido 
            WHERE idUsuario = :idUsuario");

            $stmt->bindParam(":idUsuario", $arrDatos['idUsuario'], PDO::PARAM_INT);
            $stmt->bindParam(":nombre",$arrDatos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(":apellido",$arrDatos['apellido'], PDO::PARAM_STR);
            if ($stmt->execute()) {
                return "success";
            } else {
                return "Hubo un error al editar la institucion" .nombre;
            }
            $stmt->close();
         } else {
            return "Hubo un problema: " + $arrDatos['HFCommandName'] + ", " + $arrDatos['idUsuario'];
         }
      } catch (Exception $th) {
         return $th->getMessage();
      }
    }

    public function deleteUsuarioMdl($idUsuario,$table)
    {
      try {
         $stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE idUsuario = :id");
         $stmt->bindParam(":id", $idUsuario, PDO::PARAM_INT);
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
