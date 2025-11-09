<?php

namespace App\controllers;

class cadastrarController
{
    public function render()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = trim($_POST['nome'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $senha = trim($_POST['senha'] ?? '');

            $entrar = [];
            // Aqui você pode adicionar a lógica para salvar os dados no banco de dados
            if (empty($nome)) $error = "Nome é obrigatório.";
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $error = "Email é inválido.";
            if (strlen($senha) < 6) $error = "Senha deve ter pelo menos 6 caracteres.";

            if (isset($error)) {
                foreach ($entrar as $error) {
                    echo $error;
                }
                return;
            }

            //Salvar no banco de dados (lógica não implementada aqui)

            header('Location: index.php?page=entrar');
            exit();
        } else {
            // Exibir o formulário de cadastro
            require_once __DIR__ . '/../views/cadastrarViews.php';
        }
    }
}
