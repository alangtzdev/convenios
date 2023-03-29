<?php
require_once "../include/config.php";
require_once "globlalFuncModel.php";
require_once "bitacoraModel.php";

class CoedicionesModel extends Conexion
{

   public static function getCoedicionesMdl($table)
    {
        try {
           $instituciones = "instituciones";
           $catalogos = "catalogos";
            // $cxn = Conexion::conectar();
            $arrayResult = array();
            $stmt = Conexion::conectar()->prepare("SELECT id, c.nombre as nombre, c.autor as autor, c.coautor as coautor, objeto, fechaCreacion, 
            fechaFirma, fechaFin, idEstatus, idPrograma, idContraparte, idAmbito, idOrigen,
            idResponsable, idPais, financiamiento, isIndefinida,
            encrypArchivo, rutaArchivo, i.nombre as contraparte
              FROM $table as c
             LEFT JOIN $instituciones  as i on idInstitucion = c.idContraparte");
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $arrayResult[] = array('id' => $row['id'],
                    'nombre' => $row['nombre'],
                    'autor' => $row['autor'],
                    'coautor' => $row['coautor'],
                    'objeto' => $row['objeto'],
                    'fechaCreacion' => $row['fechaCreacion'],
                    'fechaFirma' => $row['fechaFirma'] == null ? '' : $row['fechaFirma'],
                    'fechaFin' => $row['fechaFin']  == null ? '' : $row['fechaFin'],
                    'idEstatus' => $row['idEstatus'],
                    'idPrograma' => $row['idPrograma'], 
                    'idContraparte' => $row['idContraparte'], 
                    'idAmbito' => $row['idAmbito'], 
                    'idOrigen' => $row['idOrigen'],
                    'idResponsable' => $row['idResponsable'], 
                    'idPais' => $row['idPais'], 
                    'financiamiento' => $row['financiamiento'],
                    'isIndefinida' => $row['isIndefinida'] == 0 ? false : true,
                    'encrypArchivo' => $row['encrypArchivo'] == null ? "" :  $row['encrypArchivo'],
                    'rutaArchivo' => $row['rutaArchivo'] == null ? "" :  $row['rutaArchivo'],
                    'contraparte' => $row['contraparte']  == null ? "Sin asignar" :  $row['contraparte']            
                  );
            }
            
            return $arrayResult;

        } catch (Exception $th) {
            return $th->getMessage();
        }
    }

   public static function saveCoedicionMdl($arrDatos,$table,$username)
   {
      try {
         $cxn = Conexion::conectar();
         $today = date("Y-m-d H:i:s");
         $isIndefinida = $arrDatos['isIndefinida'] == true ? 1 : 0;

         $fechaFirma = $arrDatos['fechaFirma'] != "" ? date("y-m-d", strtotime($arrDatos['fechaFirma'])) : null;
         $fechaFin = $arrDatos['fechaFin'] != "" ? ($arrDatos['isIndefinida'] == true ? null : date("y-m-d", strtotime($arrDatos['fechaFin']))) : null; 
         if ($arrDatos['HFCommandName'] == 'ALTA' && $arrDatos['idCoedicion'] == "") {

             $stmt = $cxn->prepare("INSERT INTO $table (nombre, autor, coautor, objeto, fechaCreacion, fechaFirma, fechaFin,
             isIndefinida, idEstatus, idPrograma, idContraparte, idAmbito, idOrigen, 
             idResponsable, idPais, financiamiento, encrypArchivo, rutaArchivo) 
             VALUES (:nombre, :autor, :coautor, :objeto, :fechaCreacion, :fechaFirma, :fechaFin, :isIndefinida, :idEstatus, :idPrograma, :idContraparte, 
             :idAmbito, :idOrigen, :idResponsable, :idPais, :financiamiento, :encrypArchivo, :rutaArchivo)");
            $stmt->bindParam(":nombre",$arrDatos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(":autor",$arrDatos['autor'], PDO::PARAM_STR);
            $stmt->bindParam(":coautor",$arrDatos['coautor'], PDO::PARAM_STR);
            $stmt->bindParam(":objeto",$arrDatos['objeto'], PDO::PARAM_STR);
            $stmt->bindParam(":financiamiento",$arrDatos['financiamiento']);
            $stmt->bindParam(":fechaCreacion",$today, PDO::PARAM_STR);
            $stmt->bindParam(":fechaFirma",$fechaFirma); 
            $stmt->bindParam(":fechaFin",$fechaFin);
            $stmt->bindParam(":isIndefinida",$isIndefinida);
            $stmt->bindParam(":idEstatus",$arrDatos['idEstatus']);
            $stmt->bindParam(":idPrograma",$arrDatos['idPrograma']);
            $stmt->bindParam(":idContraparte",$arrDatos['idContraparte']);
            $stmt->bindParam(":idAmbito",$arrDatos['idAmbito']);
            $stmt->bindParam(":idOrigen",$arrDatos['idOrigen']);
            $stmt->bindParam(":idResponsable",$arrDatos['idResponsable']);
            $stmt->bindParam(":idPais",$arrDatos['idPais']);
            $stmt->bindParam(":encrypArchivo", $arrDatos['encrypArchivo'], PDO::PARAM_STR);
            $stmt->bindParam(":rutaArchivo",$arrDatos['rutaArchivo'], PDO::PARAM_STR);

            if ($stmt->execute()) {
               BitacoraModel::saveTransaccion($username, $table, $arrDatos['HFCommandName'], $arrDatos['nombre']);
               // var_dump($response);
               return "success";
            
           } else {
               return "Error";
           }

           $stmt = null;

         } else if ($arrDatos['HFCommandName'] == 'EDITAR' && $arrDatos['idCoedicion'] != ""){
            // var_dump($arrDatos['idCoedicion'],$arrDatos);
            $stmt = $cxn->prepare("UPDATE  $table SET nombre = :nombre, autor = :autor, coautor = :coautor, objeto = :objeto, fechaCreacion = :fechaCreacion, 
            fechaFirma = :fechaFirma, fechaFin = :fechaFin, isIndefinida = :isIndefinida,
            idEstatus = :idEstatus,  idPrograma = :idPrograma, idContraparte = :idContraparte, idAmbito = :idAmbito, 
            idOrigen = :idOrigen, idResponsable = :idResponsable, idPais = :idPais, 
            financiamiento = :financiamiento, encrypArchivo = :encrypArchivo, rutaArchivo = :rutaArchivo
            WHERE id = :idCoedicion");

            $stmt->bindParam(":idCoedicion", $arrDatos['idCoedicion']);
            $stmt->bindParam(":nombre",$arrDatos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(":autor",$arrDatos['autor'], PDO::PARAM_STR);
            $stmt->bindParam(":coautor",$arrDatos['coautor'], PDO::PARAM_STR);
            $stmt->bindParam(":objeto",$arrDatos['objeto'], PDO::PARAM_STR);
            $stmt->bindParam(":financiamiento",$arrDatos['financiamiento']);
            $stmt->bindParam(":fechaCreacion",$today, PDO::PARAM_STR);
            $stmt->bindParam(":fechaFirma",$fechaFirma); 
            $stmt->bindParam(":fechaFin",$fechaFin);
            $stmt->bindParam(":isIndefinida",$isIndefinida);
            $stmt->bindParam(":idEstatus",$arrDatos['idEstatus']);
            $stmt->bindParam(":idPrograma",$arrDatos['idPrograma']);
            $stmt->bindParam(":idContraparte",$arrDatos['idContraparte']);
            $stmt->bindParam(":idAmbito",$arrDatos['idAmbito']);
            $stmt->bindParam(":idOrigen",$arrDatos['idOrigen']);
            $stmt->bindParam(":idResponsable",$arrDatos['idResponsable']);
            $stmt->bindParam(":idPais",$arrDatos['idPais']);
            $stmt->bindParam(":encrypArchivo", $arrDatos['encrypArchivo'], PDO::PARAM_STR);
            $stmt->bindParam(":rutaArchivo",$arrDatos['rutaArchivo'], PDO::PARAM_STR);           
            if ($stmt->execute()) {
               BitacoraModel::saveTransaccion($username, $table, $arrDatos['HFCommandName'], $arrDatos['idCoedicion']);
                return "success";
            } else {
                return "Hubo un error al editar el convenio ".$arrDatos['nombre'];
            }
            $stmt->close();
         } else {
            return "Hubo un problema: " + $arrDatos['HFCommandName'] + ", " + $arrDatos['idCoedicion'];
         }
      } catch (Exception $th) {
         return $th->getMessage();
      }
   }

   public static function deleteCoedicionMdl($idCoedicion,$table,$username)
   {
      try {
         $cxn = Conexion::conectar();
         $stmt = $cxn->prepare("DELETE FROM $table WHERE idcoedicion = :id");
         $stmt->bindParam(":id", $idCoedicion, PDO::PARAM_INT);
         if($stmt->execute()){
            BitacoraModel::saveTransaccion($username, $table, "ELIMINAR", $idCoedicion);
            return "success";
         }
         else{
            return "No se pudo eliminar el coedicion";
         }
         $stmt->close();
      } catch (Throwable $th) {
         return $th->getMessage();
      }
      
   }
   
   public static function getAreasUsuario($idUsuario,$table)
   {
      try {
         $cxn = Conexion::conectar();
         $jsonArray = array();
         $stmt = $cxn->prepare("SELECT id, nombreArea FROM areas WHERE id IN (SELECT id_area FROM $table WHERE id_usuario = :id)");
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

   public static function getCategoriasArea($idArea,$table)
   {
      try {
         $cxn = Conexion::conectar();
         $jsonArray = array();
         $stmt = $cxn->prepare("SELECT id, nombreCategoria, descripcion FROM $table WHERE id_area = :id");
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
        
      } catch (Throwable $th) {
         return $th->getMessage();
      }
   }
   
}