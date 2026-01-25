<?php

namespace App\controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\controllers\AuthController;
use App\Models\Aluno;

class AlunoDashboardController
{
    public function render()
    {
        AuthController::iniciarSessao();

        echo "Usuario Dasbord";
    }


    public static function matricularAluno()
    {
        $nome = filter_input(INPUT_POST, 'nome_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
        $telefone = filter_input(INPUT_POST, 'telefone_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
        $nascimento = filter_input(INPUT_POST, 'nascimento_aluno', FILTER_DEFAULT);
        $sexo = filter_input(INPUT_POST, 'sexo_aluno',  FILTER_SANITIZE_SPECIAL_CHARS);
        $nacionalidade = filter_input(INPUT_POST, 'nacionalidade_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
        $nome_pai = filter_input(INPUT_POST, 'pai_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
        $nome_mae = filter_input(INPUT_POST, 'mae_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
        $numero_BI = filter_input(INPUT_POST, 'numero_BI_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
        $provincia = filter_input(INPUT_POST, 'provincia_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
        $altura = filter_input(INPUT_POST, 'altura_aluno', FILTER_SANITIZE_SPECIAL_CHARS);

        if (!$nome || !$email || !$telefone || !$nascimento || !$sexo || !$nacionalidade || !$nome_pai || !$nome_mae || !$numero_BI || !$provincia || !$altura) {
            die("Preencha os campos, por favor");
        }

        Aluno::salvarAluno($nome, $email, $telefone, $nascimento, $sexo, $nacionalidade, $nome_pai, $nome_mae, $numero_BI, $provincia, $altura);

        header("Location: ../../public/index.php?page=admin_dashboard");
        exit;
    }
}
AlunoDashboardController::matricularAluno();
