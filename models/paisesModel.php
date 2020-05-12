<?php 
require_once "../include/config.php";

class PaisesModel extends Conexion
{
    // $enumTipoCatalogo = array('Ambito' => 1,'Programa' => 2,'Convenio'  => 3,'tipoConvenio' =>4);
    // -------------------------------------------------------------------------------------------
    public function getPaisesMdl($table)
    {
        try {
            $cxn = Conexion::conectar();
            $arrayResult = array();
            $stmt = $cxn->prepare("SELECT * FROM $table");
            $exeResult = $stmt->execute();
            if ($exeResult) {

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                    $arrayResult[] = array('idPais' => $row['idpais'],
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
