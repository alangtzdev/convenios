<?php

class Conexion
{
    public function conectar()
    {
        try {

            $linkDb = new PDO("mysql:host=127.0.0.1:3306;dbname=conycon", "akalep", "123kalep");

            $linkDb->setAttribute(PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION);

            return $linkDb;

        } catch (PDOException $th) {
            return "Fallo en la conexion" . $th->getMessage();
        }

    } //public
}
