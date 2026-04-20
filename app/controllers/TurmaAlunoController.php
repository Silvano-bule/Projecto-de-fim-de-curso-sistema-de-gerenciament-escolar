<?php

namespace App\Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\salaModels;
use App\Models\Turma;

class TurmaAlunoController
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
        $nome_turma = filter_input(INPUT_POST, 'nome_turma', FILTER_SANITIZE_SPECIAL_CHARS);
        $periodo_turma = filter_input(INPUT_POST, 'periodo_turma', FILTER_SANITIZE_SPECIAL_CHARS);
        $sala_turma = filter_input(INPUT_POST, 'sala_turma', FILTER_SANITIZE_SPECIAL_CHARS);

        $this->validarDados($nome_turma, $periodo_turma, $sala_turma);
    }

    private function validarDados($nome, $periodo, $sala)
    {
        $erro = [];

        $nome = trim($nome);
        $periodo = trim($periodo);
        $sala = trim($_POST['sala_turma'] ?? '');


        if (empty($nome)) {
            $erro['nome'] = "O nome da turma é obrigatório.";
        }

        if (!preg_match('/^[a-zA-Z]+$/', $nome)) {
            $erro['nome'] = "O nome da turma deve conter apenas letras.";
        }

        if (filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS) === false) {
            $erro['nome'] = "O nome da turma contém caracteres inválidos.";
        }

        if (empty($periodo)) {
            $erro['periodo'] = "O período da turma é obrigatório.";
        }

        $periodosValidos = ['Manhã', 'Tarde', 'Noite', 'manha', 'tarde', 'noite'];
        if (!in_array($periodo, $periodosValidos)) {
            $erro['periodo'] = "O período da turma deve ser Manhã, Tarde ou Noite.";
        }

        if (filter_var(!$periodo, FILTER_SANITIZE_SPECIAL_CHARS)) {
            $erro['periodo'] = "O período da turma contém caracteres inválidos.";
        }


        if (empty($sala)) {
            $erro['sala'] = "A sala da turma é obrigatória.";
        }

        if (!filter_var($sala, FILTER_VALIDATE_INT) || !filter_var($sala, FILTER_SANITIZE_SPECIAL_CHARS)) {
            $erro['sala'] = "Selecione uma sala, por favor.";
        }

        if (!empty($erro)) {
            $this->redirecionarComErro($erro, $nome, $periodo, $sala);
            return;
        }
        
        if (!empty($_POST['idTurma'])) {
            $dadosAtualizados = [
                'id_turma'           => $_POST['idTurma'], // Certifique-se que o id vem do POST
                'nome_turma'        => $nome,
                'sala_turma'        => $sala,
                'periodo_turma'       => $periodo,
            ];

            // Tente atualizar
            Turma::actualizarTurma($dadosAtualizados);

            header("Location: index.php?page=admin_dashboard");
            exit();
        } else {
            $this->guardarTurma($nome, $periodo, $sala);
        }
    }

    public function guardarTurma($nome, $periodo, $sala)
    {
        Turma::guardarTurma($nome,  $periodo, $sala);

        header("Location: index.php?page=admin_dashboard");
        exit;
    }

    private function redirecionarComErro($erro, $nome, $periodo, $sala)
    {
        $_SESSION['erro'] = $erro;
        $_SESSION['nome_turma'] = $nome;
        $_SESSION['periodo_turma'] = $periodo;
        $_SESSION['sala_turma'] = $sala;

        $nome = $_SESSION['nome_turma'] ?? '';
        $periodo = $_SESSION['periodo_turma'] ?? '';
        $sala = $_SESSION['sala_turma'] ?? '';

        header("Location: index.php?page=admin_dashboard");
        exit();
    }
    public function removerTurma()
    {

        header("Content-Type: application/json");
        if (isset($_GET['id'])) {

            $id = $_GET['id'];

            $total = Turma::turmaTemAluno($id);

            if ($total > 0) {
                echo json_encode(["status" => "erro", "message" => "Não é possível remover a turma, pois há alunos associados a ela."]);
                return;
            }

            Turma::removerTurma($id);
            echo json_encode(["status" => "sucesso", "message" => "Turma removida com sucesso."]);
        }
    }

    public function obterTurmaPorId()
    {
        header("Content-Type: application/json; charset=UTF-8");

        $id = $_GET['id'] ?? null;

        if ($id) {
            $turma = Turma::obterTurmaPorId($id);

            echo json_encode($turma);
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
