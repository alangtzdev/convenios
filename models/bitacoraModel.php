<?php
require_once "../include/config.php";


class BitacoraModel  extends Conexion
{
    public static function saveTransaccion($usuario, $operacion, $modulo, $descripcion, $tabla)
    {
        try {
            $today = date("Y-m-d H:i:s");
            $table = "bitacora";

             $stmt = Conexion::conectar()->prepare("INSERT INTO $table (usuario, modulo, operacion, tabla, descripcion, fecha) 
                VALUES (:usuario, :modulo, :operacion, :tabla, :descripcion, :fecha)");
               $stmt->bindParam(":usuario",$usuario, PDO::PARAM_STR);
               $stmt->bindParam(":modulo",$modulo, PDO::PARAM_STR);
               $stmt->bindParam(":operacion",$operacion, PDO::PARAM_STR);
               $stmt->bindParam(":tabla",$tabla, PDO::PARAM_STR);
               $stmt->bindParam(":descripcion",$descripcion, PDO::PARAM_STR);
               $stmt->bindParam(":fecha",$today);
               $stmt->execute();
               $stmt = null;

            //    if($stmt->execute()){
                //   return "successs";
            //    } else {
            //     throw new Exception("Error Processing Request", 1);

            //    }

         } catch (Exception $th) {
            return $th->getMessage();
         }
    }
}


?>