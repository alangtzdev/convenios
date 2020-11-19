<?php
class RutasAPi{
    public function getRuta()
    {
        if(isset($_GET["ruta"])){

            if($_GET["ruta"] == "inicio" ||
               $_GET["ruta"] == "convenios" ||
               $_GET["ruta"] == "contratos" ||
               $_GET["ruta"] == "catalogos" ||
               $_GET["ruta"] == "instituciones" ||
               $_GET["ruta"] == "usuarios" ||
               $_GET["ruta"] == "perfil" ||
               $_GET["ruta"] == "roles" ||
               $_GET["ruta"] == "modulos" ||
               $_GET["ruta"] == "permisos" ||
               $_GET["ruta"] == "modulosxrol" ||
               $_GET["ruta"] == "permisosxacceso" ||
               $_GET["ruta"] == "guia"){

                   $modulo = $_GET["ruta"].".php";

             }else{

                $modulo =  "./include/error404.php";
             }

         }else{

            $modulo = "inicio.php";

         }
        
        include $modulo;
    }
}