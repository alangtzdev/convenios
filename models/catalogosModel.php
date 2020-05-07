<?php 
require_once "../include/config.php";

class CatalogosModel extends Conexion
{
    // $enumTipoCatalogo = array('Ambito' => 1,'Programa' => 2,'Convenio'  => 3,'tipoConvenio' =>4);
    // -------------------------------------------------------------------------------------------
    public function getCatalogosModel($table)
    {
        try {
            $cxn = Conexion::conectar();
            $arrayResult = array();
            $stmt = $cxn->prepare("SELECT * FROM $table");
            $exeResult = $stmt->execute();
            if ($exeResult) {

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                    $arrayResult[] = array('idCatalogo' => $row['idCatalogo'],
                        'nombre' => $row['nombre'],
                        'descripcion' => $row['descripcion'],
                        'idTipoCatalogo' => $row['idTipoCatalogo']);
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
    public function getCatxTipoModel($tipoCatalogo, $table) 
    {
        try {
            $cxn = Conexion::conectar();
            $stmt = $cxn->prepare("SELECT * FROM $table where idTipocatalogo = :idEnumTipoCatalogo");
            binparam(":idEnumTipoCatalogo",$enumTipoCatalogo[$tipoCatalogo], PDO::PARAM_INT);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $arrayResult[] = array('idCatalogo' => $row['idCatalogo'],
                    'nombre' => $row['nombre'],
                    'descripcion' => $row['descripcion'],
                    'idTipoCatalgo' => $row['idTipoCatalgo']
                );
            }
            
            return $arrayResult;

        } catch (Exception $th) {
            return $th->getMessage();
        }


    }

    
}
