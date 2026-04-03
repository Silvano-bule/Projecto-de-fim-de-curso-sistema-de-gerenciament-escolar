<?php

namespace App\Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\Turma;

class TurmaAlunoController
{
    public static function pegarInfoTurma()
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
}
