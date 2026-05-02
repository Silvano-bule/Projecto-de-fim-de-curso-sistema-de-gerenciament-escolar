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
    public static function verificarUsuario($nome)
    {
        $db = Database::getConnection();

        $sql = "SELECT * FROM professor WHERE nome = :nome";

        $stmt = $db->prepare($sql);

        $stmt->execute([
            ':nome' => $nome,
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function verificarEmail($email)
    {
        $db = Database::getConnection();

        $sql = "SELECT * FROM professor WHERE email = :email";

        $stmt = $db->prepare($sql);

        $stmt->execute([
            ':email' => $email,
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /*  public static function buscarTurmasDoProfessor($email)
    {
        $db = Database::getConnection();

        $sql = "SELECT p.id as prof_id, d.nome as disciplina_nome 
                FROM professor p
                INNER JOIN disciplina d ON d.id_professor = p.id
                 WHERE p.email = :email";
         $sql = "SELECT /* turma.nome AS nome_turma, turma.id as id_turma  professor.nome as prof , disciplina.nome as disc
        FROM professor 
        JOIN disciplina ON disciplina.id_professor = professor.id
         JOIN disciplina ON disciplina.id_curso = curso.id
        JOIN professor ON professor.id = disciplina.id_professor 
       JOIN turma ON turma.id = matricula.id_turma
        JOIN professor ON professor.id = disciplina.id_professor
        JOIN aluno ON aluno.id = matricula.id_aluno
        JOIN nota on nota.id_aluno = aluno.id

      

        $stmt = $db->prepare($sql);

        $stmt->execute([
            ':email' => $email
        ]);

        return  $stmt->fetchAll(PDO::FETCH_ASSOC);
    } */

    public static function buscarTurmasDoProfessor($email)
    {
        $db = Database::getConnection();

        $sql = "SELECT aluno.nome AS nome_aluno, 
                aluno.id AS id_aluno, 
                nota.valor AS valor, 
                disciplina.nome AS disciplina,
                turma.nome AS nome_turma,
                turma.id AS id_turma,
                curso.nome AS nome_curso
                FROM professor
                LEFT JOIN disciplina ON disciplina.id_professor = professor.id
                LEFT JOIN curso ON curso.id = disciplina.id_curso
                LEFT JOIN matricula ON matricula.id_curso = curso.id
                LEFT JOIN aluno on aluno.id = matricula.id_aluno
                LEFT JOIN nota ON nota.id_aluno = aluno.id
                LEFT JOIN turma ON turma.id = matricula.id_turma
                WHERE professor.email = :email";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':email' => $email
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function listarAlunosDoProfessor($email)
    {
        $db = Database::getConnection();

        $sql = "SELECT DISTINCT aluno.nome AS nome_aluno,
                aluno.id AS id_disciplina
                FROM professor
                LEFT JOIN disciplina ON disciplina.id_professor = professor.id
                LEFT JOIN curso ON curso.id = disciplina.id_curso
                LEFT JOIN matricula ON matricula.id_curso = curso.id
                LEFT JOIN aluno on aluno.id = matricula.id_aluno
                LEFT JOIN nota ON nota.id_aluno = aluno.id
                LEFT JOIN turma ON turma.id = matricula.id_turma
                WHERE professor.email = :email
                ORDER BY aluno.nome ASC";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':email' => $email
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function listarDisciplinasDoProfessor($email)
    {
        $db = Database::getConnection();

        $sql = "SELECT DISTINCT disciplina.nome AS nome_disciplina,
                                 disciplina.id AS id_disciplina
                FROM professor
                LEFT JOIN disciplina ON disciplina.id_professor = professor.id
                LEFT JOIN curso ON curso.id = disciplina.id_curso
                LEFT JOIN matricula ON matricula.id_curso = curso.id
                LEFT JOIN aluno on aluno.id = matricula.id_aluno
                LEFT JOIN nota ON nota.id_aluno = aluno.id
                LEFT JOIN turma ON turma.id = matricula.id_turma
                WHERE professor.email = :email
                ORDER BY aluno.nome ASC";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':email' => $email
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function buscarEmailDoProfessor($email)
    {
        $db = Database::getConnection();

        $sql = "SELECT professor.email FROM professor WHERE email = :email";

        $stmt = $db->prepare($sql);

        $stmt->execute([
            ':email' => $email
        ]);

        $res =  $stmt->fetch(PDO::FETCH_ASSOC);

        return $res ? $res['email'] : null;
    }

    public static function guardarNota($id_aluno, $nota_valor, $id_disciplina, $trimestre, $data, $tipo_nota)
    {
        try {
            $db = Database::getConnection();

            $sql = "INSERT INTO nota(valor, trimestre, data_nota, tipo, id_disciplina, id_aluno) 
                VALUES(:valor, :trimestre, :data_nota, :tipo, :id_disciplina, :id_aluno)";

            $stmt = $db->prepare($sql);

            return $stmt->execute([
                ':valor' => $nota_valor,
                ':trimestre' => $trimestre,
                ':data_nota' => $data,
                ':tipo' => $tipo_nota,
                ':id_disciplina' => $id_disciplina,
                ':id_aluno' => $id_aluno
            ]);
        } catch (PDOException $e) {
            die("Erro no Banco: " . $e->getMessage());
        }
    }
}
