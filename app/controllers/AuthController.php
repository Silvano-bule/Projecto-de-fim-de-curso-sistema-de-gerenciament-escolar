<?php
namespace App\controllers;

class AuthController
{
    public static function iniciarSessao()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function login($usuario)
    {
        self::iniciarSessao();

        $_SESSION['user_id'] = $usuario['idusuario'];
        $_SESSION['user_name'] = $usuario['nome'];
        $_SESSION['user_tipo'] = $usuario['tipo'];

        return true;
    }

    public static function  isLogged()
    {
        self::iniciarSessao();
        if ($_SESSION['user_id'] ?? false) {
            return true;
        }
        return false;
    }

    public static function logout()
    {
        self::iniciarSessao();
        session_unset();
        session_destroy();
        header("Location: index.php?page=entrar");
        exit;
    }
}
