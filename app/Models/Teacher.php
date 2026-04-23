<?php

namespace App\Models;

use App\core\Database;
use PDO;
use PDOException;

class Teacher
{
    public static function contarProfessores()
    {
        $db = Database::getConnection();

        $msm = "SELECT COUNT(*) AS total from professor";
        $stmt = $db->prepare($msm);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['total'];
    }
    public static function guardarDados($nome, $email, $telefone, $nascimento, $sexo, $nacionalidade, $provincia)
    {
        $db = Database::getConnection();
        $sql = "INSERT INTO professor (nome, nascimento, sexo, telefone, email, provincia, nacionalidade) VALUES (:nome, :nascimento, :sexo, :telefone, :email, :provincia, :nacionalidade)";

        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':nascimento' => $nascimento,
            ':sexo' => $sexo,
            ':telefone' => $telefone,
            ':email' => $email,
            ':provincia' => $provincia,
            ':nacionalidade' =>  $nacionalidade,
        ]);

        return $stmt->rowCount() > 0;
    }
    public static function listarProfessores()
    {
        $db = Database::getConnection();
        $sql = "SELECT * FROM professor";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function removerProfessor($id)
    {
        try {
            $db = Database::getConnection();
            $sql = "DELETE FROM professor WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->execute([':id' => $id]);
        } catch (PDOException $e) {
            echo "Erro ao remover professor: " . $e->getMessage();
        }
    }

    public static function obterProfessorPorId($id)
    {
        $db =  Database::getConnection();

        $sql = "SELECT *  FROM professor  WHERE id = :id";

        $stmt  = $db->prepare($sql);

        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function actualizarProfessor($dados)
    {
        $db = Database::getConnection();

        $sql = "UPDATE professor
        SET nome = :nome, 
        nascimento = :nascimento, 
        sexo = :sexo, 
        telefone = :telefone, 
        email = :email, 
        provincia = :provincia, 
        nacionalidade = :nacionalidade 
        WHERE id = :id";

        $stmt = $db->prepare($sql);

        return $stmt->execute([
            ':nome' => $dados['nome_professor'],
            ':email' => $dados['email_professor'],
            ':nascimento' => $dados['nascimento_professor'],
            ':sexo' => $dados['sexo_professor'],
            ':telefone' => $dados['telefone_professor'],
            ':provincia' => $dados['provincia_professor'],
            ':nacionalidade' => $dados['nacionalidade_professor'],
            ':id' => $dados['idProfessor']
        ]);
    }

    public static function registroProfesor()
    {
        $db = Database::getConnection();

        $sql = "SELECT  disciplina.nome as nome_disciplina, 
        curso.nome AS nome_curso, 
        turma.nome AS nome_turma, 
        professor.nome AS nome_professor 
        FROM curso 
        JOIN matricula ON matricula.id_curso = curso.id
        JOIN disciplina ON disciplina.id_curso = curso.id
        JOIN turma ON turma.id = matricula.id_turma
        JOIN professor ON professor.id = disciplina.id_professor";

        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
