<?php 
require_once "../include/config.php";

class CatalogosModel extends Conexion
{
    // $enumTipoCatalogo = array('Ambito' => 1,'Programa' => 2,'Convenio'  => 3,'tipoConvenio' =>4);
    // -------------------------------------------------------------------------------------------
    public static function getCatalogosModel($table)
    {
        try {
            $cxn = Conexion::conectar();
            $arrayResult = array();
            $stmt = $cxn->prepare("SELECT c.idCatalogo as idCatalogo, c.nombre as nombre, c.descripcion as descripcion, c.idTipoCatalogo as idTipoCatalogo, tipoc.idTipoCatalogo as tIdTipoCatalogo, tipoc.nombre as nombreTipoCatalogo FROM $table as c
            inner join tipocatalogos as tipoc on c.idTipoCatalogo = tipoc.idtipoCatalogo;");
            $exeResult = $stmt->execute();
            if ($exeResult) {

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                    $arrayResult[] = array('idCatalogo' => $row['idCatalogo'],
                        'nombre' => $row['nombre'],
                        'descripcion' => $row['descripcion'] == null ? '' :  $row['descripcion'],
                        'idTipoCatalogo' => $row['idTipoCatalogo'],
                        'tIdTipoCatalogo' => $row['tIdTipoCatalogo'],
                        'nombreTipoCatalogo' => $row['nombreTipoCatalogo']);
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
    public static function getCatxTipoModel($tipoCatalogo, $table) 
    {
        try {
            $cxn = Conexion::conectar();
            $stmt = $cxn->prepare("SELECT * FROM $table where idTipocatalogo = :idEnumTipoCatalogo");
            bindParam(":idEnumTipoCatalogo",$enumTipoCatalogo[$tipoCatalogo], PDO::PARAM_INT);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $arrayResult[] = array('idCatalogo' => $row['idCatalogo'],
                    'nombre' => $row['nombre'],
                    'descripcion' => $row['descripcion'] == null ? '' :  $row['descripcion'],
                    'idTipoCatalgo' => $row['idTipoCatalgo']
                );
            }
            
            return $arrayResult;

        } catch (Exception $th) {
            return $th->getMessage();
        }


    }
    // -------------------------------------------------------------------------------------------
    public static function getTiposCatalogosMdl($table)
    {
        try {
            $cxn = Conexion::conectar();
            $stmt = $cxn->prepare("SELECT idtipoCatalogo, nombre FROM $table");
            $exeResult = $stmt->execute();
            if ($exeResult) {

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    
                    $arrayResult[] = array('idtipoCatalogo' => $row['idtipoCatalogo'],
                        'nombre' => $row['nombre']);
                }

                return $arrayResult;
            } else {
                return "No se pudieron obterner los datos";
            }
        } catch (Exception $th) {
            return $th->getMessage();
        }
    }
    //------------------------------ SAVE ----------------------------------
    public static function saveCatalogoMdl($arrDatos,$table)
    {
      try {
         $today = date("Y-m-d H:i:s");

         if ($arrDatos['HFCommandName'] == 'ALTA' && $arrDatos['idCatalogo'] == "") {
             $stmt = Conexion::conectar()->prepare("INSERT INTO $table (nombre, descripcion, idTipoCatalogo) 
             VALUES (:nombre, :descripcion, :idTipoCatalogo)");
            $stmt->bindParam(":nombre",$arrDatos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion",$arrDatos['descripcion'], PDO::PARAM_STR);
            $stmt->bindParam(":idTipoCatalogo",$arrDatos['idTipoCatalogo']);
            if ($stmt->execute()) {
               return "success";
           } else {
               return "Error";
           }
           $stmt->close();
           $stmt = null;
         } else if ($arrDatos['HFCommandName'] == 'EDITAR' && $arrDatos['idCatalogo'] != ""){
            // var_dump($arrDatos['idConvenio'],$arrDatos);
            $stmt = Conexion::conectar()->prepare("UPDATE  $table SET nombre = :nombre, descripcion = :descripcion, 
            idTipoCatalogo = :idTipoCatalogo WHERE idCatalogo = :idCatalogo");

            $stmt->bindParam(":idCatalogo", $arrDatos['idCatalogo']);
            $stmt->bindParam(":nombre",$arrDatos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion",$arrDatos['descripcion'], PDO::PARAM_STR);
            $stmt->bindParam(":idTipoCatalogo",$arrDatos['idTipoCatalogo']);
            if ($stmt->execute()) {
                return "success";
            } else {
                return "Hubo un error al editar el catalogo" .$arrDatos['nombre'];
            }
            $stmt->close();
            $stmt = null;
         } else {
            return "Hubo un problema: " + $arrDatos['HFCommandName'] + ", " + $arrDatos['idCatalogo'];
         }
      } catch (Exception $th) {
         return $th->getMessage();
      }
    }

    public static function deleteCatalogoMdl($idCatalogo,$table)
   {
      try {
         $stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE idCatalogo = :id");
         $stmt->bindParam(":id", $idCatalogo, PDO::PARAM_INT);
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
