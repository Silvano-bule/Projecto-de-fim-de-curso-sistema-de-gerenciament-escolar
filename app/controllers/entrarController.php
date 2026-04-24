<?php

namespace App\controllers;

use App\Models\Usuarios;
use App\Controllers\AuthController;

class entrarController
{
     public function render()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            AuthController::iniciarSessao();

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
                    $userLoged = AuthController::login($usuario);
                    unset($_SESSION['error'], $_SESSION['old']);

                    // Normalizar o tipo para comparação
                    $tipoUsuario = strtolower(trim($usuario['tipo'] ?? ''));

                    if ($userLoged && $tipoUsuario === 'admin') {
                        header("Location: index.php?page=admin_dashboard");
                        exit;
                    } else if ($userLoged && $tipoUsuario === 'professor') {
                        header("Location: index.php?page=professor_dashboard");
                        exit;
                    } else {
                        // Se for aluno ou qualquer outro tipo, vai para aluno_dashboard
                        header("Location: index.php?page=aluno_dashboard");
                        exit;
                    }
                }
            }
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
