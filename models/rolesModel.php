<?php 
require_once "../include/config.php";

class RolesModel extends Conexion
{
    // $enumTipoCatalogo = array('Ambito' => 1,'Programa' => 2,'Convenio'  => 3,'tipoConvenio' =>4);
    // -------------------------------------------------------------------------------------------
    public static function getRolesMdl($table)
    {
        try {
            $cxn = Conexion::conectar();
            $arrayResult = array();
            $modulosxrol = "modulos_rol";
            $stmt = $cxn->prepare("SELECT *, GROUP_CONCAT(DISTINCT idmodulo ORDER BY idmodulo ASC SEPARATOR ',') as modulosxrol 
            FROM $table left JOIN $modulosxrol USING (idRol) GROUP BY idRol");
            $exeResult = $stmt->execute();
            if ($exeResult) {

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                    $arrayResult[] = array('idRol' => $row['idRol'],
                        'rol' => $row['rol'],
                        'estatus' => $row['estatus'] == null ? '' : ($row['estatus'] == 1 ? 'activo' : 'inactivo'),
                        'descripcion' => $row['descripcion'],
                        'modulosxrol' => $row['modulosxrol'] == null ? '' :  $row['modulosxrol']
                        );
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
    public static function saveRolMdl($arrDatos,$table)
    {
      try {
         $today = date("Y-m-d H:i:s");
         $tableModulos_Rol = 'modulos_rol';

         if ($arrDatos['HFCommandName'] == 'ALTA' && $arrDatos['idRol'] == "") {

             $pdo = Conexion::conectar();
             $stmt = $pdo->prepare("INSERT INTO $table (rol, descripcion, estatus) 
             VALUES (:rol, :descripcion, :estatus)");
            $stmt->bindParam(":rol",$arrDatos['rol'], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion",$arrDatos['descripcion'], PDO::PARAM_STR);
            $stmt->bindParam(":estatus",$arrDatos['estatus'], PDO::PARAM_BOOL);
            if ($stmt->execute()) {
                $id = $pdo->lastInsertId();
                RolesModel::saveModulosRolMdl($tableModulos_Rol,$arrDatos['modulos'],$id);

               return "success";
           } else {
               return "Error";
           }
           $stmt->close();
         } else if ($arrDatos['HFCommandName'] == 'EDITAR' && $arrDatos['idRol'] != ""){

            $stmt = Conexion::conectar()->prepare("UPDATE  $table SET rol = :rol, descripcion = :descripcion, estatus = :estatus 
            WHERE idRol = :idRol");

            $stmt->bindParam(":idRol", $arrDatos['idRol'], PDO::PARAM_INT);
            $stmt->bindParam(":rol",$arrDatos['rol'], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion",$arrDatos['descripcion'], PDO::PARAM_STR);
            $stmt->bindParam(":estatus",$arrDatos['estatus'], PDO::PARAM_BOOL);
            if ($stmt->execute()) {

                $response = RolesModel::deleteModulosRolMdl($tableModulos_Rol,$arrDatos['idRol']);
                if($response){
                    $responseModulos = RolesModel::saveModulosRolMdl($tableModulos_Rol,$arrDatos['modulos'],$arrDatos['idRol']);
                }
                return "success";

            } else {
                return "Hubo un error al editar el Rol";
            }
            $stmt->close();
         } else {
            return "Hubo un problema: " + $arrDatos['HFCommandName'] + ", " + $arrDatos['idRol'];
         }
      } catch (Exception $th) {
         return $th->getMessage();
      }
    }

    public static function deleteRolMdl($idRol,$table)
    {
      try {
         $stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE idRol = :id");
         $stmt->bindParam(":id", $idRol, PDO::PARAM_INT);
         if($stmt->execute()){
            return "success";
         }
         else{
            return "No se pudo eliminar el rol";
         }
         $stmt->close();
      } catch (Throwable $th) {
         return $th->getMessage();
      }
      
    }

    public static function saveModulosRolMdl($table, $arrModulos, $idRol)
    {
        try {
            $stmtM = Conexion::conectar()->prepare("INSERT INTO $table (idModulo, idRol) VALUES (:idModulo, :idRol)");

            foreach ($arrModulos as $key => $value) {
                $stmtM->bindParam(":idModulo",$value, PDO::PARAM_STR);
                $stmtM->bindParam(":idRol", $idRol, PDO::PARAM_INT);
                if (!$stmtM->execute()) {                     
                    throw new Exception('Error al insetar modulo' .$value);
                 }
                }
            return "success";
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public static function deleteModulosRolMdl($table, $idRol)
    {
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE idRol = :id");
            $stmt->bindParam(":id", $idRol, PDO::PARAM_INT);
            if($stmt->execute()){
               return "success";
            }
            else{
               return "No se pudo eliminar el rol";
            }
            $stmt->close();
         } catch (Throwable $th) {
            return $th->getMessage();
         }
    }
    
}