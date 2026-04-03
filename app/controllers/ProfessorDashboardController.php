<?php

namespace App\controllers;

use App\Models\Teacher;

class ProfessorDashboardController
{
    public function render()
    {
        AuthController::iniciarSessao();

        echo "Professor Dasboard";
    }
    public function salvarDados()
    {
        $dados = $_POST;

        if (!empty($dados['idProfessor'])) {
            Teacher::actualizarProfessor($dados);
            header("Location: index.php?page=admin_dashboard");
            exit();
        } else {
            $nome = filter_input(INPUT_POST, 'nome_professor', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email_professor', FILTER_SANITIZE_EMAIL);
            $telefone  = filter_input(INPUT_POST, 'telefone_professor', FILTER_SANITIZE_NUMBER_INT);
            $nascimento =  filter_input(INPUT_POST, 'nascimento_professor', FILTER_DEFAULT);
            $sexo  = filter_input(INPUT_POST, 'sexo_professor', FILTER_DEFAULT);
            $nacionalidade  = filter_input(INPUT_POST, 'nacionalidade_professor', FILTER_SANITIZE_SPECIAL_CHARS);
            $provincia = filter_input(INPUT_POST, 'provincia_professor', FILTER_SANITIZE_SPECIAL_CHARS);

            if (empty($nome) || empty($email) || empty($telefone) || empty($nascimento) || empty($sexo) || empty($nacionalidade) || empty($provincia)) {
                echo "Preencha todos os campos";
                return;
            }

            Teacher::guardarDados($nome, $email, $telefone, $nascimento, $sexo, $nacionalidade, $provincia);

            header('Location: index.php?page=admin_dashboard');
            exit;
        }
    }

    public function removerProfessor()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            Teacher::removerProfessor($id);
        }
    }
    public function obterProfessorId()
    {
        if (ob_get_length()) ob_clean();
        header("Content-Type: application/json; charset=UTF-8");

        $id = $_GET['id'] ?? null;


        if ($id) {
            $professor = Teacher::obterProfessorPorId($id);

            echo json_encode($professor);
        } else {
            echo json_encode(["erro" => "Id não definido"]);
        }
        exit;
    }
}
