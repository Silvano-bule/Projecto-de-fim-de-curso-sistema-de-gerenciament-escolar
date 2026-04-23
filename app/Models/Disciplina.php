<?php

namespace App\Models;

use App\core\Database;
use PDO;

class Disciplina
{
    public static function contarTurmas()
    {
        $db = Database::getConnection();
        $msm = "SELECT COUNT(*) as total from turma";
        $stmt = $db->prepare($msm);
        $stmt->execute();

        $resultado  = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['total'];
    }

    public static function guardarDisciplina($nome_turma, $curso, $prof)
    {
        $db = Database::getConnection();

        $sql = "INSERT INTO disciplina(nome, id_curso, id_professor) VALUES(:nome, :curso, :prof)";

        $stmt = $db->prepare($sql);

        $stmt->execute([
            ':nome' => $nome_turma,
            ':curso' => $curso,
            ':prof' => $prof
        ]);
    }

    public static function listarDisciplinas()
    {
        $db = Database::getConnection();
        $sql = "SELECT * FROM disciplina";
        $sql = $db->prepare($sql);

        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function turmaTemAluno($idTurma)
    {
        $db = Database::getConnection();

        $sql = "SELECT count(*) as total FROM matricula WHERE id_turma = :id";

        $stmt = $db->prepare($sql);

        $stmt->execute([':id' => $idTurma]);

        $resultado = $stmt->fetch();

        return $resultado['total'];
    }

    public static  function removerDisciplina($id)
    {
        $db = Database::getConnection();

        $sql = "DELETE FROM disciplina WHERE id = :id";

        $stmt = $db->prepare($sql);

        return $stmt->execute([':id' => $id]);
    }
    public static function obterDisciplinaPorId($id)
    {
        $db = Database::getConnection();

        $sql = "SELECT * FROM disciplina WHERE id = :id";

        $stmt = $db->prepare($sql);

        $stmt->execute([':id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function actualizarDisciplina($dados)
    {

        /* echo "<pre>";
        print_r($dados);
        echo "</pre>";
        die(); */
        $db = Database::getConnection();

        $sql = "UPDATE disciplina 
        SET nome = :nome, 
        curso = :curso
        WHERE id = :id";

        $stmt = $db->prepare($sql);

        return $stmt->execute([
            ':nome' => $dados['nome_turma'],
            ':curso' => $dados['curso'],
            ':id' => $dados['id_disciplina']
        ]);
    }
}
