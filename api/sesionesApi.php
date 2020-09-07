<?php

class Sessiones {
    public static function iniciarSesionLogin($username, $idUsuario)
    {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['idUsuario'] = $idUsuario;
        // session_destroy();
    }
}
