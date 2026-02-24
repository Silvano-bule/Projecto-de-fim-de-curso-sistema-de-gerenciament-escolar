<?php

namespace App\Controllers;

use App\controllers\AuthController;
use App\Models\Professor;

class ProfessorDashboardController
{
    public function render()
    {
        AuthController::iniciarSessao();

        echo "Professor Dasboard";
    }
    public static function  salvarDados()
    {
        $nome = filter_input(INPUT_POST, 'nome_professor', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email_professor', FILTER_SANITIZE_EMAIL);
        $telefone  = filter_input(INPUT_POST, 'telefone_professor', FILTER_SANITIZE_NUMBER_INT);
        $nascimento =  filter_input(INPUT_POST, 'nascimento_professor', FILTER_DEFAULT);
        $sexo  = filter_input(INPUT_POST, 'sexo_professor', FILTER_DEFAULT);
        $nacionalidade  = filter_input(INPUT_POST, 'nacionalidade_professor', FILTER_SANITIZE_SPECIAL_CHARS);
        $provincia = filter_input(INPUT_POST, 'provincia_professor', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($nome) || empty($email) || empty($telefone) || empty($nascimento) || empty($sexo) || empty($nacionalidade) || empty($provincia)) {
            echo "Preencha todos os campos";
            return;
        }

        Professor::guardarDados($nome, $email, $telefone, $nascimento, $sexo, $nacionalidade, $provincia);

        header('Location: ../../public/index.php?page=admin_dashboard');
        exit();
    }
}
ProfessorDashboardController::salvarDados();