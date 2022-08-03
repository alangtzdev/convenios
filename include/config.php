<?php

class Conexion
{
    public static function conectar()
    {
        try {
            $arrOptions = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => FALSE
              );
            $charset = 'utf8';  

            $linkDb = new PDO("mysql:host=127.0.0.1:3306;dbname=conycon;charset=$charset", "akalep", "123kalep", $arrOptions);

            $linkDb->setAttribute(PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION);

            return $linkDb;

        } catch (PDOException $th) {
            return "Fallo en la conexion" . $th->getMessage();
        }

    } //public
}
