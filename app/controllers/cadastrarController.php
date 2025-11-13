<?php

namespace App\controllers;

use App\Models\Usuarios;

class cadastrarController
{
    public function render()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = trim($_POST['nome'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $senha = trim($_POST['senha'] ?? '');

            $error = [];

            // Aqui você pode adicionar a lógica para salvar os dados no banco de dados
            if (empty($nome)) $error[] = "Nome é obrigatório.";
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $error[] = "Email é inválido.";
            if (strlen($senha) < 6) $error[] = "Senha deve ter pelo menos 6 caracteres.";

            if (!empty($error)) {
                foreach ($error as $erro) {
                    echo $erro;
                }
                return;
            }

            //Salvar no banco de dados (lógica não implementada aqui)
            $usuario = new Usuarios();
            $usuario::salvar($nome, $email, $senha);

            header('Location: index.php?page=entrar');
            exit();
        }

        // Exibir o formulário de cadastro
        require_once __DIR__ . '/../views/cadastrarViews.php';
    }
} 
