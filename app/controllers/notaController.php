<?php

namespace App\Controllers;

use App\Models\Teacher;

class notaController
{
    public function render()
    {
        if ($_SERVER['REQUEST_METHOD'] ===  'POST') {
            $this->pegarNotaAluno();
        }
    }

    private function pegarNotaAluno()
    {
        // Use FILTER_DEFAULT e trate manualmente ou adicione flags
        $id_aluno = filter_input(INPUT_POST, 'nome_aluno', FILTER_SANITIZE_SPECIAL_CHARS);

        $id_disciplina = filter_input(INPUT_POST, 'disciplina', FILTER_SANITIZE_SPECIAL_CHARS);

        $nota_aluno = filter_input(INPUT_POST, 'nota_aluno', FILTER_VALIDATE_INT);

        $nota_trimestre = filter_input(INPUT_POST, 'nota_trimestre', FILTER_SANITIZE_SPECIAL_CHARS);

        $data_nota = filter_input(INPUT_POST, 'data_nota', FILTER_SANITIZE_SPECIAL_CHARS);

        $tipo_nota = filter_input(INPUT_POST, 'tipo_nota', FILTER_SANITIZE_SPECIAL_CHARS);

        $this->validarDados($id_aluno, $id_disciplina, $nota_aluno, $nota_trimestre, $data_nota, $tipo_nota);
    }
    private function validarDados(string $id_aluno, string $id_disciplina, int $nota_aluno, string $nota_trimestre, string $data_nota, string $tipo_nota)
    {
        $error = [];
        $id_aluno = trim($id_aluno);
        $id_disciplina = trim($id_disciplina);
        $nota = trim($nota_aluno);
        $trimestre = trim($nota_trimestre);
        $data = trim($data_nota);
        $tipoDeNota = trim($tipo_nota);

        if (empty($id_aluno) || empty($id_disciplina) || empty($nota) || empty($trimestre) || empty($data) || empty($tipoDeNota)) {
            $error['all'] = 'Todos os campos são obrigatórios';
        }

        $nota_limpa = str_replace(',', '.', $nota);

        if (!is_numeric($nota_limpa)) {
            $error['nota'] = 'A nota deve ser um numero valido';
        }

        echo "<pre>";
        
        echo "Aluno: {$id_aluno}, Disciplina: {$id_disciplina}, Nota: {$nota_limpa}, Trimestre: {$trimestre}, Data: {$data}, Tipo de Nota: {$tipoDeNota}";

        echo "</pre>";
        exit;

        if (!empty($error)) {
            $this->redirecionarComErros($error, $id_aluno, $id_disciplina, $nota, $trimestre, $data, $tipoDeNota);
            return;
        }

        $this->salvarDados($id_aluno, $nota_limpa, $id_disciplina, $trimestre, $data, $tipo_nota);
    }

    private function salvarDados(string $id_aluno, int $nota_limpa, string $id_disciplina, string $trimestre, string $data, string $tipo_nota)
    {

        $salvo = Teacher::guardarNota($id_aluno, $nota_limpa, $id_disciplina, $trimestre, $data, $tipo_nota);

        if (!$salvo) {
            throw new \Exception("Não foi possivel salvar no banco de dados");
        }

        header("Location: index.php?page=professor_dashboard");
        exit;
    }
    private function redirecionarComErros(array $error_nota, string $id_aluno, string $id_disciplina, int $nota, string $trimestre, string $data, string $tipoDeNota)
    {
        $_SESSION['erro_nota'] = $error_nota;
        $_SESSION['id_aluno'] = $id_aluno;
        $_SESSION['id_disciplina'] = $id_disciplina;
        $_SESSION['nota'] = $nota;
        $_SESSION['trimestre'] = $trimestre;
        $_SESSION['data'] = $data;
        $_SESSION['tipoNota'] = $tipoDeNota;

        header("Location: index.php?page=professor_dashboard");
        exit();
    }
}
