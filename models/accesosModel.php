<?php
require_once "../include/config.php";

class AccesosModel extends Conexion
{
    // -------------------------------------------------------------------------------------------
    public static function getAccesosMdl($table)
    {
        try {
            $cxn = Conexion::conectar();
            $arrayResult = array();
            $stmt = $cxn->prepare("SELECT a.idAcceso, a.idRol, a.idModulo_rol, r.rol as rol, m.nombre as modulo, IFNULL((group_concat(pa.idPermiso)), 0) as idsPerxAcceso, 
            IFNULL((group_concat(p.nombre)),'No hay permisoso') as perxAcceso
            from $table as a
            INNER JOIN roles as r on r.idRol = a.idRol
            INNER JOIN modulos_rol as mr on mr.idModulo_Rol = a.idModulo_Rol
            INNER JOIN modulos as m on m.idModulo = mr.idModulo
            LEFT JOIN permisos_acceso as pa on pa.idAcceso = a.idAcceso
            LEFT JOIN permisos as p on p.idPermiso = pa.idPermiso group by modulo");
            if ($stmt->execute()) {
                $arrayResult = $stmt->fetchAll();
                if (is_array($arrayResult)) {
                    return $arrayResult;
                } else {
                    throw new Exception("No se pudieron obterner los datos");
                }
            } else {
                throw new Exception("No se pudieron obterner los datos");
            }
        } catch (Throwable $th) {
            return $th->getMessage();
        }
        # code...
    }
    // -------------------------------------------------------------------------------------------
    public static function getAccesosModuloRolMdl($idMR, $table)
    {
        try {
            $cxn = Conexion::conectar();
            $arrayResult = array();
            $tablePermisosxAcceso = "permisos_acceso";
            $tablePermisos = "permisos";
            $stmt = $cxn->prepare("SELECT p.accion, a.estatus FROM $table as a
            inner join $tablePermisosxAcceso pa using(idAcceso)
            inner join $tablePermisos p using(idPermiso) where idModulo_Rol = $idMR");
            $stmt->execute();
            $arrayResult = $stmt->fetchAll();
            if (!empty($arrayResult)) {
                return $arrayResult;
            } else {
                throw new Exception("No se pudieron obterner los datos");
            }
        } catch (Throwable $th) {
            return $th->getMessage();
        }
        # code...
    }
    // -------------------------------------------------------------------------------------------
    public static function saveAccesoMdl($arrDatos, $table)
    {
        try {
            $today = date("Y-m-d H:i:s");
            $estatus = 1;
            $tablePermisosAcceso = "permisos_acceso";
            // var_dump($arrDatos['arrPermisos']);

            if ($arrDatos['HFCommandName'] == 'ALTA' && $arrDatos['idAcceso'] == "") {
                $pdo = Conexion::conectar();
                $stmt = $pdo->prepare("INSERT INTO $table (idModulo_Rol, idRol, estatus) VALUES (:idModulo_Rol, :idRol, :estatus)");
                $stmt->bindParam(":idModulo_Rol", $arrDatos['idModuloRol'], PDO::PARAM_STR);
                $stmt->bindParam(":idRol", $arrDatos['idRol'], PDO::PARAM_STR);
                $stmt->bindParam(":estatus", $estatus, PDO::PARAM_BOOL);
                if ($stmt->execute()) {
                    $id = $pdo->lastInsertId();
                    AccesosModel::savePermisosxAccesoMdl($tablePermisosAcceso, $arrDatos['arrPermisos'], $id);

                    return "success";
                } else {
                    return "Error";
                }
                $stmt->close();
            } else if ($arrDatos['HFCommandName'] == 'EDITAR' && $arrDatos['idAcceso'] != "") {

                $stmt = Conexion::conectar()->prepare("UPDATE  $table SET idModulo_rol = :idModulo_rol, idRol = :idRol, estatus = :estatus 
            WHERE idAcceso = :idAcceso");

                $stmt->bindParam(":idAcceso", $arrDatos['idAcceso'], PDO::PARAM_INT);
                $stmt->bindParam(":idModulo_rol", $arrDatos['idModuloRol'], PDO::PARAM_INT);
                $stmt->bindParam(":idRol", $arrDatos['idRol'], PDO::PARAM_STR);
                $stmt->bindParam(":estatus", $estatus, PDO::PARAM_BOOL);
                if ($stmt->execute()) {

                    $response = AccesosModel::deletePermisosAccesoMdl($tablePermisosAcceso, $arrDatos['idAcceso']);
                    if ($response) {
                        $responseModulos = AccesosModel::savePermisosxAccesoMdl($tablePermisosAcceso, $arrDatos['arrPermisos'], $arrDatos['idAcceso']);
                    }
                    return "success";
                } else {
                    return "Hubo un error al editar el Rol";
                }
                $stmt->close();
            } else {
                return "Hubo un problema: " + $arrDatos['HFCommandName'] + ", " + $arrDatos['idAcceso'];
            }
        } catch (Exception $th) {
            return $th->getMessage();
        }
    }


    public static function savePermisosxAccesoMdl($table, $arrPermisos, $idAcceso)
    {
        try {
            $stmtM = Conexion::conectar()->prepare("INSERT INTO $table (idPermiso, idAcceso) VALUES (:idPermiso, :idAcceso)");

            foreach ($arrPermisos as $key => $value) {
                $stmtM->bindParam(":idPermiso",$value, PDO::PARAM_INT);
                $stmtM->bindParam(":idAcceso", $idAcceso, PDO::PARAM_INT);

                if (!$stmtM->execute()) {
                    throw new Exception('Error al insetar modulo' . $value);
                }
            }
            return "success";
        } catch (Throwable $th) {
            //throw $th;
        }
    }
    public static function deleteAccesoMdl($idAcceso, $table)
    {
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE idAcceso = :id");
            $stmt->bindParam(":id", $idAcceso, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return "success";
            } else {
                return "No se pudo eliminar el catalogo";
            }
            $stmt->close();
        } catch (Throwable $th) {
            return $th->getMessage();
        }
    }

    public static function deletePermisosAccesoMdl($table, $idAcceso)
    {
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE idAcceso = :id");
            $stmt->bindParam(":id", $idAcceso, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return "success";
            } else {
                return "No se pudo eliminar los permisos";
            }
            $stmt->close();
        } catch (Throwable $th) {
            return $th->getMessage();
        }
    }
}
