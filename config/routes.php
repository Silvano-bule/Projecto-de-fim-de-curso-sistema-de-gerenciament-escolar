<?php

use App\controllers\homeController;
use App\controllers\cadastrarController;
use App\controllers\entrarController;
use App\controllers\AdminDashboardController;
use App\controllers\ProfessorDashboardController;
use App\controllers\AlunoDashboardController;
use App\controllers\TurmaAlunoController;


define('AVAILABLE_ROUTES', [
    'home' => homeController::class,
    'cadastrar' => cadastrarController::class,
    'entrar' => entrarController::class,
    'admin_dashboard' => AdminDashboardController::class,
    'professor_dashboard' => ProfessorDashboardController::class,
    'aluno_dashboard' => AlunoDashboardController::class,
    'classe' => App\controllers\ClasseController::class,
    'Auth' => App\controllers\AuthController::class,
    'matricular_aluno' => AlunoDashboardController::class,
    'turma' => TurmaAlunoController::class,
    'removerAluno' => AlunoDashboardController::class
]);

define('DEFAULT_ROUTE', homeController::class);