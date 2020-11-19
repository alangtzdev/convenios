<?php

class Sessiones {
    public static function iniciarSesionLogin($username, $idUsuario, $idRol)
    {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['idUsuario'] = $idUsuario;
        $_SESSION['actividad'] = time() + 1800;
        setcookie("usuario", $username, time() + 169200, '/');
        setcookie("idUsuario", $username, time() + 169200, '/');
        setcookie("idRol", $idRol, time() + 169200, '/');
        // session_destroy();
    }

    public static function cerrarSesion()
    {
        // $_SESSION['actividad'] = time() + 84600;
    }
}
