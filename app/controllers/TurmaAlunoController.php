<?php

namespace App\Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\Turma;

class TurmaAlunoController
{
    public static function pegarInfoTurma()
    {
        $nome_turma = filter_input(INPUT_POST, 'nome_turma', FILTER_SANITIZE_SPECIAL_CHARS);
        $periodo_turma = filter_input(INPUT_POST, 'periodo_turma', FILTER_SANITIZE_SPECIAL_CHARS);
        $sala_turma = filter_input(INPUT_POST, 'sala_turma', FILTER_SANITIZE_SPECIAL_CHARS);
        $capacidade_turma = filter_input(INPUT_POST, 'capacidade_turma', FILTER_SANITIZE_NUMBER_INT);

        Turma::guardarTurma($nome_turma,  $periodo_turma, $sala_turma, $capacidade_turma);

        header("Location: ../../public/index.php?page=admin_dashboard");
        exit;
    }
}

TurmaAlunoController::pegarInfoTurma();
