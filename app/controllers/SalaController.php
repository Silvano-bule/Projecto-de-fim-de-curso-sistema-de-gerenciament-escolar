<?php

namespace App\controllers;

use App\Models\salaModels;

class SalaController
{
    public function render()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->receberDados();
        }

        require_once  dirname(__DIR__, 2) . '/views/adminDashboardView.php';
    }
    private function receberDados()
    {
        $name = filter_input(INPUT_POST, 'nome_sala', FILTER_SANITIZE_SPECIAL_CHARS);
        $capacidade = filter_input(INPUT_POST, 'capacidade', FILTER_SANITIZE_NUMBER_INT);

        $this->validarDados($name, $capacidade);
    }

    private function validarDados($nome, $capacidade)
    {

        $error = [];
        $nome = trim($nome);
        $capacidade_limpada = trim($capacidade);

        if (empty($capacidade_limpada)) {
            $error['capacidade'] = "A capacidade da sala é obrigatória.";
        }

        if (!filter_var($capacidade_limpada,  FILTER_VALIDATE_INT) || $capacidade_limpada <= 0) {
            $error['capacidade'] = "A capacidade da sala deve ser um número inteiro positivo.";
        }

        if ($capacidade_limpada > 100) {
            $error['capacidade'] = "A capacidade da sala deve ser menor ou igual a 100.";
        }

        if (!preg_match('/^[a-zA-Z0-9 ]+$/', $nome)) {
            $error['nome'] = "O nome da sala deve conter apenas letras e números, sem espaços ou caracteres especiais.";
        }

        if (empty($nome)) {
            $error['nome'] = "O nome da sala é obrigatório.";
        }

        if (!empty($error)) {
            $this->mostrarErros($error, $nome, $capacidade);
            return;
        }

        $this->salvarDados($nome, $capacidade_limpada);
    }

    private function salvarDados($nome, $capacidade)
    {
        salaModels::salvarDados($nome, $capacidade);

        header("Location: index.php?page=admin_dashboard");
        exit();
    }

    public function mostrarErros($error, $nome, $capacidade)
    {
        $_SESSION['error'] = $error;
        $_SESSION['nome_sala'] = $nome;
        $_SESSION['capacidade'] = $capacidade;

        $nome = $_SESSION['nome_sala'] ?? '';
        $capacidade = $_SESSION['capacidade'] ?? '';
        
        require dirname(__DIR__) . '/components/modals/sala.php';
        exit();
    }


    /* 
        ===== PASSOS PARA GRENCIAAR A SALA DO ALUNO ======
        
        1. Criar o modal para inserir a sala (Feito)
        2. Criar a função para receber os dados do modal (Feito)
        3. Criar a função para validar os dados recebidos (Feito)
        4. Criar a função para salvar os dados no banco de dados (Feito
    */
}
