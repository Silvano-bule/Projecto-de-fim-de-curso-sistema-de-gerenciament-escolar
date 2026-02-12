<?php 

namespace App\Controllers;
require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\Curso;

class CursoController {
    public static function guardarCurso() {
        $nome_curso = filter_input(INPUT_POST, 'nome_curso', FILTER_SANITIZE_SPECIAL_CHARS);
        $area_tecnica_curso = filter_input(INPUT_POST, 'area_tecnica_curso', FILTER_SANITIZE_SPECIAL_CHARS);
        $estado = filter_input(INPUT_POST, 'status_curso', FILTER_SANITIZE_SPECIAL_CHARS);

        Curso::guardarCurso($nome_curso, $area_tecnica_curso, $estado);

        header("Location: ../../public/index.php?page=admin_dashboard");
        exit;
    }
}

CursoController::guardarCurso();