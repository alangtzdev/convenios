<?php 
require_once "../include/config.php";

class InstitucionesModel extends Conexion
{
    // -------------------------------------------------------------------------------------------
    public function getInstitucionesMdl($table)
    {
        try {
            $cxn = Conexion::conectar();
            $arrayResult = array();
            $stmt = $cxn->prepare("SELECT * FROM $table");
            $exeResult = $stmt->execute();
            if ($exeResult) {

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                    $arrayResult[] = array('idInstitucion' => $row['idInstitucion'],
                        'nombre' => $row['nombre'],
                        'abreviacion' => $row['abreviacion']);
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
    
}
