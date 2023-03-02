<?php
include_once("env.php");
class Conexion
{
    private const DBHOST = HOSTNAME;
    private const DBUSER = USERNAME;
    private const DBPASS = PASSWORD;
    private const DBNAME = DATABASE;
    public static function conectar()
    {
        try {
            $server = Conexion::DBHOST;
            $user = Conexion::DBUSER;
            $pass = Conexion::DBPASS;
            $db = Conexion::DBNAME;
            $arrOptions = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => FALSE
              );
            $charset = 'utf8';  

            $linkDb = new PDO("mysql:host=$server;dbname=$db;charset=$charset", "$user", "$pass", $arrOptions);

            $linkDb->setAttribute(PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION);

            return $linkDb;

        } catch (PDOException $th) {
            return "Fallo en la conexion" . $th->getMessage();
        }

    } //public
}
