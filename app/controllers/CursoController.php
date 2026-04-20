<?php

namespace App\Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\Curso;
use App\controllers\AuthController;

class CursoController
{
    /*  public static function guardarCurso()
    {
        $nome_curso = filter_input(INPUT_POST, 'nome_curso', FILTER_SANITIZE_SPECIAL_CHARS);
        $area_tecnica_curso = filter_input(INPUT_POST, 'area_tecnica_curso', FILTER_SANITIZE_SPECIAL_CHARS);
        $estado = filter_input(INPUT_POST, 'status_curso', FILTER_SANITIZE_SPECIAL_CHARS);

        Curso::guardarCurso($nome_curso, $area_tecnica_curso, $estado);

        header("Location: ../../public/index.php?page=admin_dashboard");
        exit;
    }

    public static function listarCursos()
    {
        $cursos = Curso::listarCursos();

        if (!is_array($cursos)) {
            $cursos = [];
        }
        $viewPath = __DIR__ . '/../views/adminDashboardView.php';

        require $viewPath;
    }
     */

    public function render()
    {
        $this->iniciarSessão();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->receberDados();
            return;
        }
        require_once __DIR__ . '/../views/adminDashboardView.php';
    }
    private function iniciarSessão()
    {
        if (session_status() === PHP_SESSION_NONE) {
            AuthController::iniciarSessao();
        }
    }
    public function receberDados()
    {
        $nome_curso = filter_input(INPUT_POST, 'nome_curso', FILTER_SANITIZE_SPECIAL_CHARS);
        $descrição = filter_input(INPUT_POST, 'descricao_curso', FILTER_SANITIZE_SPECIAL_CHARS);

        $this->validarDados($nome_curso, $descrição);
    }

    public function validarDados($nome, $descricao)
    {
        $error_curso = [];
        $nome_curso = trim($nome);
        $descricao_curso = trim($descricao);

        if (empty($nome_curso)) {
            $error_curso['nome_curso'] = "O nome do curso é obrigatório.";
        }

        if (!filter_var($nome_curso, FILTER_SANITIZE_SPECIAL_CHARS)) {
            $error_curso['nome_curso'] = "O nome do curso deve conter apenas caracteres válidos.";
        }

        if (!preg_match('/^[a-zA-Z\s]+$/', $nome_curso)) {
            $error_curso['nome_curso'] = "O nome do curso deve conter apenas letras e espaços.";
        }

        $cursoValido = ["Ciencias Eonómicas  Juridicas", "Gestão de Sistemas Informáticos", "Ciencias Fisicas e Biologicas", "Quimica Industrial", "GSI", "CEJ", "CFB", "QI"];

        if (!in_array($nome_curso, $cursoValido)) {
            $error_curso['nome_curso'] = "O nome do curso deve ser um dos seguintes: " . implode(", ", $cursoValido) . ".";
        }
        if (empty($descricao_curso)) {
            $error_curso['descricao_curso'] = "A descrição do curso é obrigatória.";
        }

        if (!filter_var($descricao_curso, FILTER_SANITIZE_SPECIAL_CHARS)) {
            $error_curso['descricao_curso'] = "A descrição do curso deve conter apenas caracteres válidos.";
        }

        if ($nome_curso) {
            $cursoExistente = Curso::verificarCursoExistente($nome_curso);
            if ($cursoExistente) {
                $error_curso['nome_curso'] = "O nome do curso já existe. Por favor, escolha outro nome.";
            }
        }
        if (!empty($error_curso)) {
            $this->redirecionarComErro($error_curso, $nome_curso, $descricao_curso);
            return;
        }

        if (!empty($_POST['idCurso'])) {
            $dadosAtualizados = [
                'id_curso'           => $_POST['idCurso'], // Certifique-se que o id vem do POST
                'nome_curso'        => $nome,
                'descricao_curso'        => $descricao_curso
            ];

            // Tente atualizar
            Curso::actualizarTurma($dadosAtualizados);

            header("Location: index.php?page=admin_dashboard");
            exit();
        } else {
            $this->salvarCurso($nome_curso, $descricao_curso);
        }
    }

    public function salvarCurso($nome_curso, $descricao_curso)
    {
        Curso::guardarCurso($nome_curso, $descricao_curso);
        header("Location: index.php?page=admin_dashboard");
        exit;
    }

    public function redirecionarComErro($error_curso, $nome_curso, $descricao_curso)
    {
        $_SESSION['error_curso'] = $error_curso;
        $_SESSION['nome_curso'] = $nome_curso;
        $_SESSION['descricao_curso'] = $descricao_curso;

        header("Location: index.php?page=admin_dashboard");
        exit;
    }
    public function removerCurso()
    {
        header("Content-Type: application/json");
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $total = Curso::cursoTemAluno($id);

            if ($total > 0) {
                echo json_encode(["status" => "erro", "message" => "Não é possível remover a turma, pois há alunos associados a ela."]);
                return;
            }

            Curso::removerCurso($id);
            echo json_encode(["status" => "sucesso", "message" => "Turma removida com sucesso."]);
        }
    }

    public function obterCursoPorId()
    {
        header("Content-Type: application/json; charset=UTF-8");

        $id = $_GET['id'] ?? null;

        if ($id) {
            $curso = Curso::obterCursoPorId($id);

            echo json_encode($curso);
        } else {
            echo json_encode(["erro" => "Id não definido"]);
        }
    }
    /* 
            ===== PASSOS PARA GERENCIAR O CURSO DO ALUNO ======
                1- INICIAR SESSÃO
                2- RECEBER OS DADOS DO FORMULÁRIO
                3- VALIDAR OS DADOS DO FORMULARIO
                4- SALVAR OS DADOS NO BANCO        
        */
}
