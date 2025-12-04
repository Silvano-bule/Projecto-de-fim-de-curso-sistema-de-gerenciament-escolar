<?php

namespace App\controllers;

use App\Models\Usuarios;
use App\controllers\AuthController;

class cadastrarController
{
    public function render()
    {
        if (session_status() === PHP_SESSION_NONE) {
            AuthController::iniciarSessao();
        }

        // ===========================
        // GET → mostrar form com erros (se existirem)
        // ===========================

        $error = $_SESSION['error'] ?? [];
        $nome = $_SESSION['nome'] ?? '';
        $email = $_SESSION['email'] ?? '';
        $senha = $_SESSION['senha'] ?? '';
        $tipo = $_SESSION['tipo'] ?? '';

        // limpar para não ficar preso
        unset($_SESSION['error'], $_SESSION['nome'], $_SESSION['email'], $_SESSION['senha'], $_SESSION['tipo']);

        // ===========================
        // POST → processar cadastro
        // ===========================

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nome = trim($_POST['nome'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $senha = trim($_POST['senha'] ?? '');
            $tipo = trim($_POST['tipo'] ?? '');

            $error = [];

            // validações
            if ($nome === '') {
                $error['nome'] = "Nome é obrigatório.";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "Email inválido.";
            }
            if($tipo === ''){
                $error['tipo'] = "Tipo de usuario é obrigatório.";
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
                $_SESSION['senha'] = $senha;
                $_SESSION['tipo'] = $tipo;

                header("Location: ?page=cadastrar");
                exit;
            }

            // sem erro → salvar
            Usuarios::salvar($nome, $email, $senha, $tipo);

            header("Location: ?page=entrar");
            exit;
        }

        // exibir view
        require_once __DIR__ . '/../views/cadastrarViews.php';
    }
}
