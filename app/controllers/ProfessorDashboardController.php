<?php

namespace App\controllers;

use App\Models\Teacher;
use App\Models\Usuarios;
use App\Models\Turma;
use App\Models\Curso;
use App\Models\salaModels;
use App\Models\Matricula;
use App\Models\Disciplina;
use App\Models\Aluno;
use App\controllers\AuthController;

class ProfessorDashboardController
{
    public function render()
    {
        AuthController::iniciarSessao();

        if (!AuthController::isLogged()) {
            header("Location: index.php?page=login");
            exit;
        }

        if ($_SESSION['user_tipo'] !== 'professor') {
            header("Location: index.php?page=login");
        }


        $email_professor =  trim($_SESSION['user_email'] ?? null);


        $emailEncontrado = Teacher::buscarEmailDoProfessor($email_professor);
        $alunosDoProf = Teacher::listarAlunosDoProfessor($email_professor);
        $registroGeralProfessor = [];

        if ($emailEncontrado) {
            $registroGeralProfessor = Teacher::buscarTurmasDoProfessor($emailEncontrado);
            $listarDisciplinasDoProfessor = Teacher::listarDisciplinasDoProfessor($email_professor);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->receberDados();
            return;
        }

        $this->dadosUsuario($registroGeralProfessor, $alunosDoProf, $listarDisciplinasDoProfessor);
    }

    private function receberDados()
    {
        $nome = filter_input(INPUT_POST, 'nome_professor', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email_professor', FILTER_SANITIZE_EMAIL);
        $telefone  = filter_input(INPUT_POST, 'telefone_professor', FILTER_SANITIZE_NUMBER_INT);
        $nascimento =  filter_input(INPUT_POST, 'nascimento_professor', FILTER_DEFAULT);
        $sexo  = filter_input(INPUT_POST, 'sexo_professor', FILTER_SANITIZE_SPECIAL_CHARS);
        $nacionalidade  = filter_input(INPUT_POST, 'nacionalidade_professor', FILTER_SANITIZE_SPECIAL_CHARS);
        $provincia = filter_input(INPUT_POST, 'provincia_professor', FILTER_SANITIZE_SPECIAL_CHARS);

        $this->validarDados($nome, $email, $telefone, $nascimento, $sexo, $nacionalidade, $provincia);
    }
    public function validarDados($nome, $email, $telefone, $nascimento, $sexo, $nacionalidade, $provincia)
    {
        // Validation logic here
        $error_professor = [];
        $nome = trim($nome);
        $email = trim($email);
        $telefone = trim($telefone);
        $nascimento = trim($nascimento);
        $sexo = trim($sexo);
        $nacionalidade = trim($nacionalidade);
        $provincia = trim($provincia);

        if (empty($nome)) {
            $error_professor['nome'] = "O nome do professor é obrigatório";
        }

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_professor['email'] = "O email do professor é inválido ou obrigatório";
        }

        if (!preg_match('/^[9][0-9]{8}$/', $telefone)) {
            $error_professor['telefone'] = "O telefone deve começar com 9 e ter 9 dígitos";
        }
        if (empty($nascimento)) {
            $error_professor['nascimento'] = "A data de nascimento do professor é obrigatória";
        }

        if (empty($nacionalidade)) {
            $error_professor['nacionalidade'] = "A nacionalidade do professor é obrigatória";
        }

        if (!in_array($sexo, ['M', 'F'])) {
            $error_professor['sexo'] = "Opção de sexo inválida";
        }
        if (empty($provincia)) {
            $error_professor['provincia'] = "A província do professor é obrigatória";
        }

        if (!empty($error_professor)) {
            $this->redirecionarComErro($error_professor, $nome, $email, $telefone, $nascimento, $sexo, $nacionalidade, $provincia);
        }

        if (!empty($_POST['idProfessor'])) {

            $dadosAtualizados = [
                'idProfessor'           => $_POST['idProfessor'], // Certifique-se que o id vem do POST
                'nome_professor'        => $nome,
                'email_professor'       => $email,
                'telefone_professor'    => $telefone,
                'nascimento_professor'  => $nascimento,
                'sexo_professor'        => $sexo,
                'nacionalidade_professor' => $nacionalidade,
                'provincia_professor' => $provincia
            ];

            // Tente atualizar
            Teacher::actualizarProfessor($dadosAtualizados);

            header("Location: index.php?page=admin_dashboard");
            exit();
        } else {
            $this->salvarDados($nome, $email, $telefone, $nascimento, $sexo, $nacionalidade, $provincia);
        }
    }

    private function redirecionarComErro($error_professor, $nome, $email, $telefone, $nascimento, $sexo, $nacionalidade, $provincia)
    {
        $_SESSION['error_professor'] = $error_professor;
        $_SESSION['nome_professor'] = $nome;
        $_SESSION['email_professor'] = $email;
        $_SESSION['telefone_professor'] = $telefone;
        $_SESSION['nascimento_professor'] = $nascimento;
        $_SESSION['sexo_professor'] = $sexo;
        $_SESSION['nacionalidade_professor'] = $nacionalidade;
        $_SESSION['provincia_professor'] = $provincia;

        header("Location: index.php?page=admin_dashboard");
        exit();
    }

    private function salvarDados($nome, $email, $telefone, $nascimento, $sexo, $nacionalidade, $provincia)
    {
        try {
            $salvo = Teacher::guardarDados($nome, $email, $telefone, $nascimento, $sexo, $nacionalidade, $provincia);

            if (!$salvo) {
                throw new \Exception('Não foi possível salvar o professor no banco de dados.');
            }

            header('Location: index.php?page=admin_dashboard');
            exit;
        } catch (\Exception $e) {
            $this->redirecionarComErro(['db' => $e->getMessage()], $nome, $email, $telefone, $nascimento, $sexo, $nacionalidade, $provincia);
        }
    }
    public function removerProfessor()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            Teacher::removerProfessor($id);
        }
        header("Location: index.php?page=admin_dashboard");
        exit();
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
    private function dadosUsuario($registroGeralProfessor, $alunosDoProf, $listarDisciplinasDoProfessor)
    {
        $dados = [
            'nome' => $_SESSION['user_name'],
            'tipo' => $_SESSION['user_tipo'],
            'totalUsers' => Usuarios::contarUsuarios(),
            'totalAlunos' => Aluno::contarAlunos(),
            'totalProfessores' => Teacher::contarProfessores(),
            'totalTurmas' => Turma::contarTurmas(),
            'totalCursos' => Curso::contarCursos(),



            'salasEncontradas' => salaModels::listarSalas(),
            'alunosRecentes' => Aluno::listarAlunosRecentes(),
            'matriculaGerada' => Matricula::listarAlunosComMatriculas(),
            'alunos' => Aluno::listarAlunos(),
            'professores' => Teacher::listarProfessores(),
            'turmasEncontradas' => Turma::listarTurma(),
            'disciplinasEncontradas' => Disciplina::listarDisciplinas(),
            'cursosEncontrados' => Curso::listarCursos(),
            'registros' => Turma::obterRegistro(),
            'registroProfesor' => Teacher::registroProfesor(),
            'registroGeralProfessor' => $registroGeralProfessor,
            'alunosDoProf' => $alunosDoProf,
            'listarDisciplinasDoProfessor' => $listarDisciplinasDoProfessor
        ];


        extract($dados);
        require __DIR__ . '/../views/professorDashboardView.php';
    }
}
