<?php

namespace App\controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\controllers\AuthController;
use App\Models\Aluno;
use App\controllers\TurmaAlunoController;
use App\controllers\matriculaController;
use App\Models\Matricula;

class AlunoDashboardController
{
    public function render()
    {
        AuthController::iniciarSessao(); 
        $alunosEncontrados = Aluno::listarAlunosRecentes();

        if (!is_array($alunosEncontrados)) {
            $alunosEncontrados = [];
        }

        echo "<pre>";
        print_r($alunosEncontrados);
        $viewPath = __DIR__ . '/../views/adminDashboardView.php';

        require $viewPath;
    }


    public function matricularAluno()
    {
        // Verificar se é uma requisição AJAX
        $isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
                 strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

        $nome = filter_input(INPUT_POST, 'nome_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email_aluno', FILTER_SANITIZE_EMAIL);
        $telefone = filter_input(INPUT_POST, 'telefone_aluno', FILTER_SANITIZE_NUMBER_INT);
        $nascimento = filter_input(INPUT_POST, 'nascimento_aluno', FILTER_DEFAULT);
        $sexo = filter_input(INPUT_POST, 'sexo_aluno',  FILTER_DEFAULT);
        $nacionalidade = filter_input(INPUT_POST, 'nacionalidade_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
        $nome_pai = filter_input(INPUT_POST, 'pai_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
        $nome_mae = filter_input(INPUT_POST, 'mae_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
        $numero_BI = filter_input(INPUT_POST, 'numero_BI_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
        $provincia = filter_input(INPUT_POST, 'provincia_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
        $altura_raw = filter_input(INPUT_POST, 'altura_aluno', FILTER_DEFAULT);
        $turma = filter_input(INPUT_POST, 'turma_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
        $curso = filter_input(INPUT_POST, 'curso', FILTER_SANITIZE_SPECIAL_CHARS);
        $classe = filter_input(INPUT_POST, 'classe_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
        $sala = filter_input(INPUT_POST, 'sala', FILTER_SANITIZE_SPECIAL_CHARS);
        $altura = str_replace(',', '.', $altura_raw);

        // Validações
        if (strlen($telefone) !== 9) {
            if ($isAjax) {
                header('Content-Type: application/json');
                http_response_code(400);
                echo json_encode(["erro" => "Telefone deve conter exatamente 9 dígitos"]);
                exit();
            }
            header('Location: index.php?page=admin_dashboard');
            exit();
        }

        if (!preg_match('/^\d{9}LA\d{3}$/', $numero_BI)) {
            if ($isAjax) {
                header('Content-Type: application/json');
                http_response_code(400);
                echo json_encode(["erro" => "Formato de número do BI inválido"]);
                exit();
            }
            die("Formato de numero de BI inválido");
        }

        if (empty($nome)  || empty($email) || empty($telefone) || empty($nascimento) || empty($nacionalidade) || $sexo === "" || empty($nome_mae) || empty($nome_pai) || empty($numero_BI) || empty($provincia) || empty($altura) || empty($turma) || empty($curso) || empty($classe) || empty($sala)) {
            if ($isAjax) {
                header('Content-Type: application/json');
                http_response_code(400);
                echo json_encode(["erro" => "Preencha todos os campos obrigatórios"]);
                exit();
            }
            die("Preencha os campos, por favor");
        }

        try {
            $idAluno = Aluno::salvarAluno($nome, $email, $telefone, $nascimento, $sexo, $nacionalidade, $nome_pai, $nome_mae, $numero_BI, $provincia, $altura, $turma, $curso, $classe, $sala);

            if (!$idAluno) {
                throw new \Exception("Falha ao salvar aluno no banco de dados");
            }

            $numeroDeMatricula = Matricula::gerarMatricula();
            Matricula::salvarMatricula($numeroDeMatricula, $idAluno, $turma);

            if ($isAjax) {
                header('Content-Type: application/json');
                http_response_code(200);
                echo json_encode(["status" => "ok", "message" => "Aluno matriculado com sucesso"]);
                exit();
            }

            // Redireciona de volta para a dashboard de administrador
            header("Location: index.php?page=admin_dashboard");
            exit();
        } catch (\PDOException $e) {
            if ($isAjax) {
                header('Content-Type: application/json');
                http_response_code(500);
                echo json_encode(["erro" => "Erro de banco de dados: " . $e->getMessage()]);
                exit();
            }
            die("Erro ao matricular aluno: " . $e->getMessage());
        } catch (\Exception $e) {
            if ($isAjax) {
                header('Content-Type: application/json');
                http_response_code(500);
                echo json_encode(["erro" => "Erro interno: " . $e->getMessage()]);
                exit();
            }
            die("Erro ao matricular aluno: " . $e->getMessage());
        }
    }
    public function listarAlunos()
    {
        $alunosEncontrados = Aluno::listarAlunos();

        if (!is_array($alunosEncontrados)) {
            $alunosEncontrados = [];
        }
        $viewPath = __DIR__ . '/../views/adminDashboardView.php';

        require $viewPath;
    }
    public function removerAluno()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            Aluno::removerAluno($id);
        }
        header("Location: ?page = Aluno");
    }
    public function atualizarAluno()
    {
        header('Content-Type: application/json');

        $dados = $_POST;

        if (empty($dados)) {
            http_response_code(400);
            echo json_encode(["erro" => "Dados POST vazios"]);
            exit;
        }

        try {
            Aluno::atualizarAluno($dados);
            http_response_code(200);
            echo json_encode(["status" => "ok"]);
        } catch (\Exception $e) {
            error_log("Erro ao atualizar aluno (" . $e->getFile() . ":" . $e->getLine() . "): " . $e->getMessage());
            http_response_code(500);
            echo json_encode(["erro" => "Erro interno: " . $e->getMessage()]);
        }
        exit;
    }

    public function obterAluno()
    {
        header('Content-Type: application/json');

        if (!isset($_GET['id'])) {
            http_response_code(400);
            echo json_encode(["erro" => "ID do aluno não fornecido"]);
            exit;
        }

        $id = intval($_GET['id']);
        $aluno = Aluno::obterAlunoPorId($id);

        if ($aluno) {
            http_response_code(200);
            echo json_encode($aluno);
        } else {
            http_response_code(404);
            echo json_encode(["erro" => "Aluno com ID $id não encontrado", "id_buscado" => $id]);
        }
        exit;
    }
}
