<?php

namespace App\controllers;

use App\controllers\AuthController;
use App\Models\Usuarios;
use App\Models\Aluno;
use App\Models\Professor;
use App\Models\Turma;
use App\Models\Curso;
use App\Models\Teacher;
use App\Models\Classe;

class AdminDashboardController
{
    public function render()
    {
        AuthController::iniciarSessao();

        /*  var_dump($_SESSION['user_tipo']);
        exit; */

        if (AuthController::isLogged() === false) {
            header("Location: index.php?page=entrar");
            exit;
        }

        if (!isset($_SESSION['user_tipo']) || $_SESSION['user_tipo'] !== 'admin') {
            header("Location: index.php?page=entrar");
            exit;
        }

        $dados = [
            'nome' => $_SESSION['user_name'],
            'totalUsers' => Usuarios::contarUsuarios(),
            'totalAlunos' => Aluno::contarAlunos(),
            'totalProfessores' => Teacher::contarProfessores(),
            'totalTurmas' => Turma::contarTurmas(),
            'totalCursos' => Curso::contarCursos(),
            'turmasEncontradas' => Turma::listarTurma(),
            'cursosEncontrados' => Curso::listarCursos(),
            'totalClasses' => Classe::totalClasses(),
            'classesEncontradas' => Classe::classes(),
        ];
        extract($dados);
        require_once __DIR__ . '/../views/adminDashboardView.php';
    }
}
