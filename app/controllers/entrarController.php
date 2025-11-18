<?php

namespace App\controllers;

use App\Models\Usuarios;

class entrarController
{
    public function render()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $_SESSION['error'] = [];
            $_SESSION['old'] = [];

            $email = trim($_POST['email'] ?? '');
            $senha = trim($_POST['senha'] ?? '');

            $_SESSION['old']['email'] = $email;

            if ($email === '') $_SESSION['error']["email"] = "Email é obrigatório.";
            if ($senha === '') $_SESSION['error']["senha"] = "Senha é obrigatória.";

            if (empty($_SESSION['error'])) {

                $usuario = Usuarios::buscarPorEmail($email);

                if (!$usuario || !password_verify($senha, $usuario['senha'])) {
                    $_SESSION['error']["senha"] = "Email ou senha inválidos.";
                } else {
                    // Login bem sucedido
                    unset($_SESSION['error'], $_SESSION['old']);
                    header("Location: index.php?page=dashboard");
                    exit;
                }
            }

            // ← REDIRECT PARA EVITAR QUE A VIEW SEJA EXIBIDA EM POST
            header("Location: index.php?page=entrar");
            exit;
        }

        // GET REQUEST — PEGA OS ERROS E "OLD"
        $error = $_SESSION['error'] ?? [];
        $email = $_SESSION['old']['email'] ?? '';
        $senha = '';

        // limpa erros após pegar
        unset($_SESSION['error'], $_SESSION['old']);

        require __DIR__ . '/../views/entrarViews.php';
    }
}
