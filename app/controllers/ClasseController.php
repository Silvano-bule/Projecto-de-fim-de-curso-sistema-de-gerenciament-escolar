<?php

namespace App\controllers;

use App\Models\Classe;
use App\Models\Curso;
use Error;

class ClasseController
{
    /*  public function pegarInfoClasse()
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
         var_dump($idClasse);
        die();
       
        Classe::ligarCurso($idClasse,  $curso);
        header("Location: index.php?page=admin_dashboard");
        exit;
    } */

    /*  public function cursosEncontrados()
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
    } */


    public function render()
    {
        $this->iniciarSessao();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->pegarInfoClasse();
            return;
        }
        require __DIR__ . '/../views/adminDashboardView.php';
    }
    private function iniciarSessao()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function pegarInfoClasse()
    {
        $nome = filter_input(INPUT_POST, 'nome_classe', FILTER_SANITIZE_SPECIAL_CHARS);

        $this->validarDados($nome);
    }

    private function validarDados($nome)
    {
        $error_classe = [];
        $nome = trim($nome);

        if (empty($nome)) {
            $error_classe['nome_classe'] = "O nome da classe é obrigatório.";
        }

        if (!ctype_digit($nome)) {
            $error_classe['nome_classe'] = "O nome da classe contém caracteres inválidos.";
        }

        if($nome){
            $classeExistente = Classe::classesExistente();
            foreach ($classeExistente as $classe) {
                if (strtolower($classe['nome']) === strtolower($nome)) {
                    $error_classe['nome_classe'] = "Já existe uma classe com esse nome.";
                    break;
                }
            }
        }
        if (!empty($error_classe)) {
            $this->redirecinarComErros($error_classe, $nome);
            return;
        }

        $this->salvarDados($nome);
    }

    private function redirecinarComErros($error_classe, $nome)
    {
        $_SESSION['error_classes'] = $error_classe;
        $_SESSION['nome_classe'] = $nome;

        header("Location: index.php?page=admin_dashboard");
    }

    private function salvarDados($nome)
    {
        Classe::guardarDados($nome);

        header("Location: index.php?page=admin_dashboard");
        exit;
    }




    /* 
    ===== PASSOS PARA GERENCIAR A CLASSE DO ALUNO ====
    
    1- INICIAR SESSÃO
    2- RECEBER OS DADOS DO FORMULÁRIO (NOME DA CLASSE E CURSO)
    3- VALIDAR OS DADOS 
    4- CHAMAR O MÉTODO PARA GUARDAR A CLASSE NO BANCO DE DADOS
    */
}
