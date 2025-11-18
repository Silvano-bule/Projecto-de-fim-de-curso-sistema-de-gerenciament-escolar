<?php

namespace App\controllers;

use App\Models\Usuarios;

class cadastrarController
{
    public function render()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // ===========================
        // GET → mostrar form com erros (se existirem)
        // ===========================

        $error = $_SESSION['error'] ?? [];
        $nome = $_SESSION['nome'] ?? '';
        $email = $_SESSION['email'] ?? '';

        // limpar para não ficar preso
        unset($_SESSION['error'], $_SESSION['nome'], $_SESSION['email']);

        // ===========================
        // POST → processar cadastro
        // ===========================

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nome = trim($_POST['nome'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $senha = trim($_POST['senha'] ?? '');

            $error = [];

            // validações
            if ($nome === '') {
                $error['nome'] = "Nome é obrigatório.";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "Email inválido.";
            }

            if(Usuarios::buscarPorEmail($email)){
                $error['email'] = 'Este email já esta cadastrado';
            }

            if (strlen($senha) < 6) {
                $error['senha'] = "A senha precisa ter pelo menos 6 caracteres.";
            }

            // tem erro → salvar sessão e redirect
            if (!empty($error)) {
                $_SESSION['error'] = $error;
                $_SESSION['nome'] = $nome;
                $_SESSION['email'] = $email;

                header("Location: ?page=cadastrar");
                exit;
            }

            // sem erro → salvar
            Usuarios::salvar($nome, $email, $senha);

            header("Location: ?page=entrar");
            exit;
        }

        // exibir view
        require_once __DIR__ . '/../views/cadastrarViews.php';
    }
}
