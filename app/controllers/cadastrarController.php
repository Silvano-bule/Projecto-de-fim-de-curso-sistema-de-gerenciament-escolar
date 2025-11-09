<?php

namespace App\controllers;

class cadastrarController
{
    public function render()
    {
        $nome = trim($_POST['nome'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $senha = trim($_POST['senha'] ?? '');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Aqui você pode adicionar a lógica para salvar os dados no banco de dados
            if (empty($nome) || empty($senha) || empty($email)) {
                echo "<script>alert('Por favor, preencha todos os campos.');</script>";
            } else {
                // Por enquanto, vamos apenas exibir os dados recebidos
                echo "<script>alert('Cadastro realizado com sucesso! Nome: $nome, Email: $email');</script>";
            }
        }
        require_once __DIR__ . '/../views/cadastrarViews.php';
    }
}
