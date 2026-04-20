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

        if ($nome) {
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


         if (!empty($_POST['idClasse'])) {
            $dadosAtualizados = [
                'id_classe'           => $_POST['idClasse'], // Certifique-se que o id vem do POST
                'nome_classe'        => $nome
            ];

            // Tente atualizar
            Classe::actualizarClasse($dadosAtualizados);

            header("Location: index.php?page=admin_dashboard");
            exit();
        } else {
             $this->salvarDados($nome);
        }
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


    public function removerClasse()
    {
        header("Content-Type: application/json");
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $total = Curso::cursoTemAluno($id);

            if ($total > 0) {
                echo json_encode(["status" => "erro", "message" => "Não é possível remover a turma, pois há alunos associados a ela."]);
                return;
            }

            Classe::removerClasse($id);
            echo json_encode(["status" => "sucesso", "message" => "Turma removida com sucesso."]);
        }
    }

    public function obterClassePorId()
    {
        header("Content-Type: application/json; charset=UTF-8");

        $id = $_GET['id'] ?? null;

        if ($id) {
            $curso = Classe::obterClassePorId($id);

            echo json_encode($curso);
        } else {
            echo json_encode(["erro" => "Id não definido"]);
        }
    }

    /* 
    ===== PASSOS PARA GERENCIAR A CLASSE DO ALUNO ====
    
    1- INICIAR SESSÃO
    2- RECEBER OS DADOS DO FORMULÁRIO (NOME DA CLASSE E CURSO)
    3- VALIDAR OS DADOS 
    4- CHAMAR O MÉTODO PARA GUARDAR A CLASSE NO BANCO DE DADOS
    */
}
