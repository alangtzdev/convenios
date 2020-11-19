<?php 
require_once "../include/config.php";
class ModulosRolModel extends Conexion {

    public static function getModulosRolMdl($idRol, $table)
    {

        try {

            $tableModulos = 'modulos';
            $arrayResult = array();
            $stmt =  Conexion::conectar()->prepare("SELECT mr.*, m.nombre, m.modulo, ifnull(m.idModuloPadre,0) as idModuloPa  from $table as mr
            INNER JOIN $tableModulos as m on m.idmodulo = mr.idModulo  WHERE idRol = $idRol");
            // $stmt->bindParam(":idRol", $idRol, PDO::PARAM_INT);
            $stmt->execute();
            $arrayResult = $stmt->fetchAll();
            if (!empty($arrayResult)) {
                    return $arrayResult;
            } else {
                throw new Exception("No se pudieron obterner los datos");
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        # code...
    }

}