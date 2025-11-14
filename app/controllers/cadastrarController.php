<?php

namespace App\controllers;

use App\Models\Usuarios;

class cadastrarController
{
    public function render()
    {
        $nome = '';
        $email = '';
        $senha = '';
        $error = [];  // ← Inicializar ANTES do if

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = trim($_POST['nome'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $senha = trim($_POST['senha'] ?? '');

            // Validações
            if (empty($nome)) $error['nome'] = "Nome é obrigatório.";
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $error['email'] = "Email é inválido.";
            if (strlen($senha) < 6) $error['senha'] = "Senha deve ter pelo menos 6 caracteres.";

            // ⭐ PARAR SE HOUVER ERROS
            if (!empty($error)) {
                require_once __DIR__ . '/../views/cabaçalho.php';
                require_once __DIR__ . '/../views/cadastrarViews.php';
                return; // ← Para aqui, não continua
            }

            // Só chega aqui se NÃO houver erros
            $usuario = new Usuarios();
            $usuario::salvar($nome, $email, $senha);

            header('Location: index.php?page=entrar');
            exit();
        }

        // Exibir o formulário de cadastro

        // Debug: registra o valor atual de $nome no log do PHP
        error_log('[DEBUG cadastrar] $nome raw: ' . var_export($nome, true));
        require_once __DIR__ . '/../views/cabaçalho.php';
        require_once __DIR__ . '/../views/cadastrarViews.php';
    }
}
