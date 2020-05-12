<?php 
require_once "../include/config.php";

class UsuariosModel extends Conexion
{
    // $enumTipoCatalogo = array('Ambito' => 1,'Programa' => 2,'Convenio'  => 3,'tipoConvenio' =>4);
    // -------------------------------------------------------------------------------------------
    public function getUsuariosMdl($table)
    {
        try {
            $cxn = Conexion::conectar();
            $arrayResult = array();
            $stmt = $cxn->prepare("SELECT * FROM $table");
            $exeResult = $stmt->execute();
            if ($exeResult) {

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                    $arrayResult[] = array('idUsuario' => $row['idUsuario'],
                        'nombre' => $row['nombre'],
                        'apellido' => $row['apellido']);
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
