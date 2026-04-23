<?php

namespace App\Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';
use App\Models\Disciplina;

class DisciplinaController
{
    /* public static function pegarInfoTurma()
    {

        $dados = $_POST;

        if ($dados['idTurma']) {
            Turma::actualizarTurma($dados);
            header("Location: ../public/index.php?page=admin_dashboard");
            exit;
        } else {
            $nome_turma = filter_input(INPUT_POST, 'nome_turma', FILTER_SANITIZE_SPECIAL_CHARS);
            $periodo_turma = filter_input(INPUT_POST, 'periodo_turma', FILTER_SANITIZE_SPECIAL_CHARS);
            $sala_turma = filter_input(INPUT_POST, 'sala_turma', FILTER_SANITIZE_SPECIAL_CHARS);
            $capacidade_turma = filter_input(INPUT_POST, 'capacidade_turma', FILTER_SANITIZE_NUMBER_INT);

            Turma::guardarTurma($nome_turma,  $periodo_turma, $sala_turma, $capacidade_turma);
        }
        header("Location: ../public/index.php?page=admin_dashboard");
        exit;
    }
    public static function listarTurmas()
    {
        return Turma::listarTurma();
    }
   
*/

    public function render()
    {
        $this->iniciarSessao();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->receberDados();
        }

        require_once __DIR__ . '/../views/admin_dashboard.php';
    }
    private function iniciarSessao()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    private function receberDados()
    {
        $nome_disciplina = filter_input(INPUT_POST, 'nome_disciplina', FILTER_SANITIZE_SPECIAL_CHARS);
        $curso = filter_input(INPUT_POST, 'curso', FILTER_SANITIZE_SPECIAL_CHARS);
        $prof = filter_input(INPUT_POST, 'professor', FILTER_SANITIZE_SPECIAL_CHARS);

        $this->validarDados($nome_disciplina, $curso, $prof);
    }

    private function validarDados($nome_disciplina, $curso, $prof)
    {
        $erro_disciplina = [];

        $nome = trim($nome_disciplina);

        if (empty($nome)) {
            $erro_disciplina['nome_disciplina'] = "O nome da disciplina é obrigatório.";
        }

        if (!preg_match('/^[a-zA-Z]+$/', $nome)) {
            $erro_disciplina['nome_disciplina'] = "O nome da disciplina deve conter apenas letras.";
        }

        if (filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS) === false) {
            $erro_disciplina['nome_disciplina'] = "O nome da disciplina contém caracteres inválidos.";
        }

        if (empty($curso)) {
            $erro_disciplina['curso'] = "O curso da turma é obrigatório.";
        }

        if (!empty($erro)) {
            $this->redirecionarComErro($erro_disciplina, $nome,$curso, $prof);
            return;
        }

        if (!empty($_POST['idDisciplina'])) {
            $dadosAtualizados = [
                'id_turma'           => $_POST['idDisciplina'], // Certifique-se que o id vem do POST
                'nome_disciplina'        => $nome,
                'curso'        => $curso,
                'prof'        => $prof

            ];

            // Tente atualizar
            Disciplina::actualizarDisciplina($dadosAtualizados);

            header("Location: index.php?page=admin_dashboard");
            exit();
        } else {
            $this->guardarDisciplina($nome, $curso, $prof);
        }
    }

    public function guardarDisciplina($nome, $curso, $prof)
    {
        Disciplina::guardarDisciplina($nome,  $curso, $prof);

        header("Location: index.php?page=admin_dashboard");
        exit;
    }

    private function redirecionarComErro($erro, $nome, $curso, $prof)
    {
        $_SESSION['erro_disciplina'] = $erro;
        $_SESSION['nome_disciplina'] = $nome;
        $_SESSION['curso'] = $curso;
        $_SESSION['prof'] = $prof;

        $nome = $_SESSION['nome_disciplina'] ?? '';
        $curso = $_SESSION['curso'] ?? '';
        $prof = $_SESSION['prof'] ?? '';

        header("Location: index.php?page=admin_dashboard");
        exit();
    }
    public function removerDisciplina()
    {

        header("Content-Type: application/json");
        if (isset($_GET['id'])) {

            $id = $_GET['id'];

            Disciplina::removerDisciplina($id);
            echo json_encode(["status" => "sucesso", "message" => "Turma removida com sucesso."]);
        }
    }

    public function obterDisciplinaPorId()
    {
        header("Content-Type: application/json; charset=UTF-8");

        $id = $_GET['id'] ?? null;

        if ($id) {
            $disciplina = Disciplina::obterDisciplinaPorId($id);

            echo json_encode($disciplina);
        } else {
            echo json_encode(["erro" => "Id não definido"]);
        }
    }
    /* 
        
        ===== PASSOS PARA GERENCIAR TURMA DO ALUNO=====
                1- INICIAR SESSÃO
                2- RECEBER DADOS DO FORMULÁRIO
                3- VALIDAR DADOS
                    - Se tiver erro, mostrar mensagem e parar execução
                4- SALVAR DADOS NO BANCO DE DADOS
        */
}
