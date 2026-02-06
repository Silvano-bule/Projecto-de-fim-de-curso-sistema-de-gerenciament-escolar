<?php

namespace App\Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\Turma;
use App\controllers\AuthController;

class TurmaAlunoController
{
    public static function pegarInfoTurma()
    {
        // Iniciar a sessão para garantir que o usuário está autenticado
        authController::iniciarSessao();

        $nome_turma = filter_input(INPUT_POST, 'nome_turma', FILTER_SANITIZE_SPECIAL_CHARS);
        $periodo_turma = filter_input(INPUT_POST, 'periodo_turma', FILTER_SANITIZE_SPECIAL_CHARS);
        $sala_turma = filter_input(INPUT_POST, 'sala_turma', FILTER_SANITIZE_SPECIAL_CHARS);
        $capacidade_turma = filter_input(INPUT_POST, 'capacidade_turma', FILTER_SANITIZE_NUMBER_INT);

        $_SESSION['error'] = [];

        if ($capacidade_turma <= 0 || $capacidade_turma > 60) {
            $_SESSION['error']['capacidade'] = 'Capacidade Inválida: Deve ser um número positivo e não pode exceder 60.';
        }

        if (!empty($_SESSION['error'])) {
            $error = $_SESSION['error'] ?? [];
            unset($_SESSION['error']);
        }

        Turma::guardarTurma($nome_turma,  $periodo_turma, $sala_turma, $capacidade_turma);

        header("Location: ../../public/index.php?page=admin_dashboard");
        exit;
    }
}

TurmaAlunoController::pegarInfoTurma();
