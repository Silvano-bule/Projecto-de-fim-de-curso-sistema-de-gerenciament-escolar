<?php

namespace App\controllers;

use App\Models\Classe;
use App\Models\Curso;

class ClasseController
{
    public function pegarInfoClasse()
    {
        $nome = filter_input(INPUT_POST, 'nome_classe', FILTER_SANITIZE_SPECIAL_CHARS);
        $curso = filter_input(INPUT_POST, 'curso', FILTER_SANITIZE_SPECIAL_CHARS);

        if (!$curso) {
            die("Selecione um curso.");
        }

        $idClasse =  Classe::guardar($nome);

        if (!$idClasse) {
            die("Erro ao criar a classe.");
        }
        /*  var_dump($idClasse);
        die();
 */
        Classe::ligarCurso($idClasse,  $curso);
        header("Location: index.php?page=admin_dashboard");
        exit;
    }

    public function cursosEncontrados()
    {
        $cursosEncontrados = Curso::listarCursos();

        if (!is_array($cursosEncontrados)) {
            $cursosEncontrados = [];
        }
        $viewPath = __DIR__ . '/../views/adminDashboardView.php';

        require $viewPath;
    }

    public function classesEncontradas()
    {
        $classesEncontradas = Classe::classes();

        if (!is_array($classesEncontradas)) {
            $classesEncontradas = [];
        }

        $viewPath = __DIR__ . '/../views/adminDashboardView.php';

        require $viewPath;
    }
}
