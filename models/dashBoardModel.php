<?php
require_once "../include/config.php";
class DashboardModel extends Conexion
{
    public static function getDatosConvenios($table)
    {
        try {
            $cxn = Conexion::conectar();
            $arrayResult = array();
            $stmt = $cxn->prepare("SELECT 
            count(*) as totalConvenios,
            sum(if(idTipoConvenio = 59, 1, 0)) as colaboracion,
            sum(if(idTipoConvenio = 58, 1, 0)) as marco,
            sum(if(idTipoConvenio = 18, 1, 0)) as especifico
            FROM $table");
            $stmt->execute();
            $arrayResult = $stmt->fetchAll();

            return $arrayResult;

        } catch (Exception $th) {
            return $th->getMessage();
        }
    }

    public static function getDatosContratos($table)
    {
        try {
            $cxn = Conexion::conectar();
            $arrayResult = array();
            $stmt = $cxn->prepare("SELECT 
            count(*) as totalContratos,
            sum(if(idTipoConvenio = 59, 1, 0)) as colaboracion,
            sum(if(idTipoConvenio = 21, 1, 0)) as privado,
            sum(if(idTipoConvenio = 22, 1, 0)) as publico,
            sum(if(idTipoConvenio = 23, 1, 0)) as social
            FROM $table");
            $stmt->execute();
            $arrayResult = $stmt->fetchAll();
            return $arrayResult;

        } catch (Exception $th) {
            return $th->getMessage();
        }
    }

}
