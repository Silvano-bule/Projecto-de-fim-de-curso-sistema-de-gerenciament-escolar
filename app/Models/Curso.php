<?php

namespace App\Models;

use App\core\Database;
use PDO;

class Curso
{
    public static function contarCursos()
    {

        $db = Database::getConnection();
        $msm = "SELECT COUNT(*) as total from curso";
        $stmt = $db->prepare($msm);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['total'];
    }

    public static function guardarCurso($nome_curso, $descricao_curso)
    {
        $db = Database::getConnection();

        $sql = "INSERT INTO curso (nome, descricao) VALUES (:nome, :descricao)";

        $stmt = $db->prepare($sql);

        $stmt->execute(
            [
                ':nome' => $nome_curso,
                ':descricao' => $descricao_curso
            ]
        );
    }


    public static function verificarCursoExistente($nome_curso)
    {
        $db = Database::getConnection();

        $sql = "SELECT COUNT(*) as total FROM curso WHERE nome = :nome_curso";

        $stmt = $db->prepare($sql);

        $stmt->execute([
            ':nome_curso' => $nome_curso,
        ]);

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['total'] > 0;
    }
    public static function listarCursos()
    {
        $db = Database::getConnection();
        $sql = "SELECT * FROM curso";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function cursoTemAluno($idCurso)
    {
        $db = Database::getConnection();

        $sql = "SELECT count(*) as total FROM matricula WHERE id_curso = :id";

        $stmt = $db->prepare($sql);

        $stmt->execute([':id' => $idCurso]);

        $resultado = $stmt->fetch();

        return $resultado['total'];
    }
    public static  function removerCurso($id)
    {
        $db = Database::getConnection();

        $sql = "DELETE FROM curso WHERE id = :id";

        $stmt = $db->prepare($sql);

        return $stmt->execute([':id' => $id]);
    }
    public static function obterCursoPorId($idCurso)
    {
        $db = Database::getConnection();

        $sql  = "SELECT * FROM curso WHERE id = :idCurso";

        $stmt = $db->prepare($sql);

        $stmt->execute([
            'idCurso' => $idCurso,
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function actualizarTurma($dados)
    {

        /* echo "<pre>";
        print_r($dados);
        echo "</pre>";
        die(); */
        $db = Database::getConnection();

        $sql = "UPDATE curso
        SET nome = :nome, 
        descricao = :descricao
        WHERE id = :id";

        $stmt = $db->prepare($sql);

        return $stmt->execute([
            ':nome' => $dados['nome_curso'],
            ':descricao' => $dados['descricao_curso'],
            ':id' => $dados['id_curso']
        ]);
    }

    public static function registroCurso()
    {
        $db = Database::getConnection();

        $sql = "SELECT  disciplina.nome as nome_disciplina, 
        curso.nome AS nome_curso, 
        turma.nome AS nome_turma, 
        professor.nome AS nome_professor 
        FROM curso 
        LEFT JOIN matricula ON matricula.id_curso = curso.id
        LEFT JOIN disciplina ON disciplina.id_curso = curso.id
        LEFT JOIN turma ON turma.id = matricula.id_turma
        LEFT JOIN professor ON professor.id = disciplina.id_professor";

        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
