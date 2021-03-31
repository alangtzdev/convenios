<?php
require_once "../include/config.php";

class PerfilModel extends Conexion
{
    public function getPerfilModel($table)
   {
      try {
        $jsonArray = array();
         $stmt = Conexion::conectar()->prepare("SELECT * FROM $table where idUsuario = :idUsuario");
         $stmt->execute();
         return $stmt->fetchAll();
     } catch (Exception $th) {
        die($th->getMessage());
     }
   }
   
   public function editPerfilModel($arrPerfil, $table)
   {
      try {
         $stmt = Conexion::conectar()->prepare("UPDATE $table SET nombre = :nombre, apaterno = :apaterno, amaterno = :amaterno, ocupacion = :ocupacion, correo = :correo, nombreUsuario = :nombreUsuario WHERE id = :idUsuario");
         $stmt->bindParam(":idUsuario",$arrPerfil['idUsuario']);
         $stmt->bindParam(":nombre",$arrPerfil['nombre']);
         $stmt->bindParam(":apaterno",$arrPerfil['apaterno']);
         $stmt->bindParam(":amaterno",$arrPerfil['amaterno']);
         $stmt->bindParam(":ocupacion",$arrPerfil['ocupacion']);
         $stmt->bindParam(":correo",$arrPerfil['correo']);
         $stmt->bindParam(":nombreUsuario",$arrPerfil['nombreUsuario']);
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
}
?>