<?php
require_once "../include/config.php";

class ContratosModel extends Conexion
{
   public function getContratosMdl($table)
    {
        try {
            $arrayResult = array();
            $stmt = Conexion::conectar()->prepare("SELECT idContrato, nombre, descripcion, fechaCreacion, 
            fechaFirma, fechaFin, isIndefinida, idPrograma, idContraparte, idAmbito, idOrigen, 
            idTipoConvenio, idResponsable, idPais, financiamiento   FROM $table");
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $arrayResult[] = array('idContrato' => $row['idContrato'],
                    'nombre' => $row['nombre'],
                    'descripcion' => $row['descripcion'],
                    'fechaCreacion' => $row['fechaCreacion'],
                    'fechaFirma' => $row['fechaFirma'],
                    'fechaFin' => $row['fechaFin'],
                    'isIndefinida' => $row['isIndefinida'] == 0 ? false : true ,
                    'idPrograma' => $row['idPrograma'], 
                    'idContraparte' => $row['idContraparte'], 
                    'idAmbito' => $row['idAmbito'], 
                    'idOrigen' => $row['idOrigen'], 
                    'idTipoConvenio' => $row['idTipoConvenio'], 
                    'idResponsable' => $row['idResponsable'], 
                    'idPais' => $row['idPais'], 
                    'financiamiento' => $row['financiamiento']
                );
            }
            
            return $arrayResult;

        } catch (Exception $th) {
            return $th->getMessage();
        }
    }
   public function saveContratoMdl($arrDatos,$table)
   {
      try {
         $today = date("Y-m-d H:i:s");

         $fechaFirma = date("y-m-d", strtotime($arrDatos['fechaFirma']));
         $fechaFin = $arrDatos['isIndefinida'] == true ? null : date("y-m-d", strtotime($arrDatos['fechaFin'])); 
         if ($arrDatos['HFCommandName'] == 'ALTA' && $arrDatos['idContrato'] == "") {

             $stmt = Conexion::conectar()->prepare("INSERT INTO $table (nombre, descripcion, fechaCreacion, fechaFirma, fechaFin,
             isIndefinida, idPrograma, idContraparte, idAmbito, idOrigen, idTipoConvenio, idResponsable, idPais, financiamiento) 
             VALUES (:nombre, :descripcion, :fechaCreacion, :fechaFirma, :fechaFin, :isIndefinida, :idPrograma, :idContraparte, 
             :idAmbito, :idOrigen, :idTipoConvenio, :idResponsable, :idPais, :financiamiento)");
            $stmt->bindParam(":nombre",$arrDatos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion",$arrDatos['descripcion'], PDO::PARAM_STR);
            $stmt->bindParam(":financiamiento",$arrDatos['financiamiento']);
            $stmt->bindParam(":fechaCreacion",$today, PDO::PARAM_STR);
            $stmt->bindParam(":fechaFirma",$fechaFirma); 
            $stmt->bindParam(":fechaFin",$fechaFin);
            $stmt->bindParam(":isIndefinida",$arrDatos['isIndefinida']);
            $stmt->bindParam(":idPrograma",$arrDatos['idPrograma'], PDO::PARAM_INT);
            $stmt->bindParam(":idContraparte",$arrDatos['idContraparte'], PDO::PARAM_INT);
            $stmt->bindParam(":idAmbito",$arrDatos['idAmbito'], PDO::PARAM_INT);
            $stmt->bindParam(":idOrigen",$arrDatos['idOrigen'], PDO::PARAM_INT);
            $stmt->bindParam(":idTipoConvenio",$arrDatos['idTipoConvenio'], PDO::PARAM_INT);
            $stmt->bindParam(":idResponsable",$arrDatos['idResponsable'], PDO::PARAM_INT);
            $stmt->bindParam(":idPais",$arrDatos['idPais'], PDO::PARAM_INT);
            if ($stmt->execute()) {
               return "success";
           } else {
               return "Error";
           }
           $stmt->close();
         } else if ($arrDatos['HFCommandName'] == 'EDITAR' && $arrDatos['idContrato'] != ""){
            // var_dump($arrDatos['idConvenio'],$arrDatos);
            $stmt = Conexion::conectar()->prepare("UPDATE  $table SET nombre = :nombre, descripcion = :descripcion, fechaCreacion = :fechaCreacion, 
            fechaFirma = :fechaFirma, fechaFin = :fechaFin, isIndefinida = :isIndefinida, idPrograma = :idPrograma, idContraparte = :idContraparte, 
            idAmbito = :idAmbito, idOrigen = :idOrigen, idTipoConvenio = :idTipoConvenio, idResponsable = :idResponsable, idPais = :idPais, 
            financiamiento = :financiamiento WHERE idcontrato = :idContrato");

            $stmt->bindParam(":idContrato", $arrDatos['idContrato']);
            $stmt->bindParam(":nombre",$arrDatos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion",$arrDatos['descripcion'], PDO::PARAM_STR);
            $stmt->bindParam(":financiamiento",$arrDatos['financiamiento']);
            $stmt->bindParam(":fechaCreacion",$today, PDO::PARAM_STR);
            $stmt->bindParam(":fechaFirma",$fechaFirma); 
            $stmt->bindParam(":fechaFin",$fechaFin);
            $stmt->bindParam(":isIndefinida",$arrDatos['isIndefinida']);
            $stmt->bindParam(":idPrograma",$arrDatos['idPrograma'], PDO::PARAM_INT);
            $stmt->bindParam(":idContraparte",$arrDatos['idContraparte'], PDO::PARAM_INT);
            $stmt->bindParam(":idAmbito",$arrDatos['idAmbito'], PDO::PARAM_INT);
            $stmt->bindParam(":idOrigen",$arrDatos['idOrigen'], PDO::PARAM_INT);
            $stmt->bindParam(":idTipoConvenio",$arrDatos['idTipoConvenio'], PDO::PARAM_INT);
            $stmt->bindParam(":idResponsable",$arrDatos['idResponsable'], PDO::PARAM_INT);
            $stmt->bindParam(":idPais",$arrDatos['idPais'], PDO::PARAM_INT);
            if ($stmt->execute()) {
                return "success";
            } else {
                return "Hubo un error al editar el contrato" .nombre;
            }
            $stmt->close();
         } else {
            return "Hubo un problema: " + $arrDatos['HFCommandName'] + ", " + $arrDatos['idContrato'];
         }
      } catch (Exception $th) {
         return $th->getMessage();
      }
   }
   public function deleteContratoMdl($idContrato,$table)
   {
      try {
         $stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE idcontrato = :id");
         $stmt->bindParam(":id", $idContrato, PDO::PARAM_INT);
         if($stmt->execute()){
            return "success";
         }
         else{
            return "No se pudo eliminar el contrato";
         }
         $stmt->close();
      } catch (Throwable $th) {
         return $th->getMessage();
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
   public function subirContrato($nombreEncriptado,$ruta,$table)
   {
      try {
         $pdo = Conexion::conectar();
          $stmt = $pdo->prepare("INSERT INTO $table(encrypContrato, rutaContrato) VALUES (:encrypNomContrato, :ruta)");
          $stmt->bindParam(":encrypNomContrato",$nombreEncriptado, PDO::PARAM_STR);
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
}