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
    /*  public function render()
    {
        $this->iniciarSessao();
        $this->registrarAluno();
        $alunosEncontrados = $this->alunosRecentes();

        require  __DIR__ . '/../views/adminDashboardView.php';
    }

    private function iniciarSessao()
    {
        if (session_status() === PHP_SESSION_NONE) {
            AuthController::iniciarSessao();
        }
    }
    private function alunosRecentes()
    {
        $alunosRecentes = Aluno::listarAlunosRecentes();

        if (!is_array($alunosRecentes)) {
            $alunosRecentes = [];
        }

        return $alunosRecentes;
    }

    public function registrarAluno()
    {
        $this->receberDadosAluno();
        $dados = $_POST;
        if (!empty($dados['idaluno'])) {
            Aluno::actualizarAluno($dados);
            header("Location: index.php?page=admin_dashboard");
            exit();
        } else {
            // Verificar se é uma requisição AJAX


            // Validações


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
    }
    private function receberDadosAluno()
    {
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

        $this->validarDadosAluno($nome, $email, $telefone, $nascimento, $sexo, $nacionalidade, $nome_pai, $nome_mae, $numero_BI, $provincia, $altura, $turma, $curso, $classe, $sala);
    }

    private function validarDadosAluno($nome, $email, $telefone, $nascimento, $sexo, $nacionalidade, $nome_pai, $nome_mae, $numero_BI, $provincia, $altura, $turma, $curso, $classe, $sala)
    {
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


    public function obterAlunoPorId()
    {
        if (ob_get_length()) ob_clean();

        $id = $_GET['id'] ?? null;

        header("Content-Type: application/json; charset=UTF-8");

        if ($id) {
            $usuario = Aluno::obterAlunoPorId($id);

            echo json_encode($usuario);
        } else {
            echo json_encode(["erro" => "Id não definido"]);
        }
        exit;
    }

    public static function actualizarAluno()
    {

        var_dump($_POST);
        /* 
        if ($dados) {
            $sucesso = Aluno::actualizarAluno($dados);
            echo json_encode(["sucesso" => $sucesso]);
        } else {
            echo json_encode(["erro" => "Dados Incompletos"]);
        }  }*/



    public function render()
    {
        $this->criarSessão();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->receberDadosAluno();
        }
        $this->exibirViews();

        require_once __DIR__ . '/../views/alunoDashboardView.php';
    }

    private function criarSessão()
    {
        if (session_status() === PHP_SESSION_NONE) {
            AuthController::iniciarSessao();
        }
    }

    private function receberDadosAluno()
    {
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
        $altura = str_replace(',', '.', $altura_raw);

        // Validar os dados
        $this->validarDadosAluno($nome, $email, $telefone, $nascimento, $sexo, $nacionalidade, $nome_pai, $nome_mae, $numero_BI, $provincia, $altura);
    }

    private function validarDadosAluno($nome, $email, $telefone, $nascimento, $sexo, $nacionalidade, $nome_pai, $nome_mae, $numero_BI, $provincia, $altura)
    {
        if (strlen($telefone) !== 9) {
            die("Telefone deve conter exatamente 9 dígitos");
        }

        if (!preg_match('/^\d{9}LA\d{3}$/', $numero_BI)) {
            die("Formato de numero de BI inválido");
        }

        if (empty($nome)  || empty($email) || empty($telefone) || empty($nascimento) || empty($nacionalidade) || $sexo === "" || empty($nome_mae) || empty($nome_pai) || empty($numero_BI) || empty($provincia) || empty($altura)) {
            die("Preencha os campos, por favor");
        }

        $this->salvarAluno($nome, $email, $telefone, $nascimento, $sexo, $nacionalidade, $nome_pai, $nome_mae, $numero_BI, $provincia, $altura);
    }

    private function salvarAluno($nome, $email, $telefone, $nascimento, $sexo, $nacionalidade, $nome_pai, $nome_mae, $numero_BI, $provincia, $altura)
    {
        try {
            $idAluno = Aluno::salvarAluno($nome, $email, $telefone, $nascimento, $sexo, $nacionalidade, $nome_pai, $nome_mae, $numero_BI, $provincia, $altura);

            if (!$idAluno) {
                throw new \Exception("Falha ao salvar aluno no banco de dados");
            }

            // Redireciona de volta para a dashboard de administrador
            header("Location: index.php?page=admin_dashboard");
            exit();
        } catch (\PDOException $e) {
            die("Erro ao matricular aluno: " . $e->getMessage());
        } catch (\Exception $e) {
            die("Erro ao matricular aluno: " . $e->getMessage());
        }
    }

    private function exibirViews()
    {
        header("Location: index.php?page=admin_dashboard");
        exit();
    }

    /* 
        =========== PASSOS PARA REGISTRAR UM USUÁRIO =============
        1. CRIAR SESSÃO
        2. RECEBER DADOS DO FORMULÁRIO
        3. VALIDAR DADOS
        4. SALVAR NO BANCO DE DADOS
        5. REDIRECIONAR PARA A DASHBOARD DE ADMINISTRADOR
    /* 
        =========== PASSOS PARA REGISTRAR UM ALUNO =============
        1. CRIAR SESSÃO
        2. RECEBER DADOS DO FORMULÁRIO
        3. VALIDAR DADOS
        4. SALVAR NO BANCO DE DADOS
        5. REDIRECIONAR PARA A DASHBOARD DE ADMINISTRADOR
        
    */
}
