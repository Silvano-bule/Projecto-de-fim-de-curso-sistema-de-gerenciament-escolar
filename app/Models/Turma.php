<?php

namespace App\Models;

use App\core\Database;
use PDO;

class Turma
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

    public static function guardarTurma($nome_turma, $periodo_turma, $sala, $classe)
    {
        $db = Database::getConnection();

        $sql = "INSERT INTO turma(nome, periodo,classe, id_sala) VALUES(:nome, :periodo,:classe, :sala)";

        $stmt = $db->prepare($sql);

        $stmt->execute([
            ':nome' => $nome_turma,
            ':periodo' => $periodo_turma,
            ':sala' => $sala,
            ':classe' => $classe
        ]);
    }

    public static function listarTurma()
    {
        $db = Database::getConnection();
        $sql = "SELECT * FROM turma";
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

    public static  function removerTurma($id)
    {
        $db = Database::getConnection();

        $sql = "DELETE FROM turma WHERE id = :id";

        $stmt = $db->prepare($sql);

        return $stmt->execute([':id' => $id]);
    }
    public static function obterTurmaPorId($id)
    {
        $db = Database::getConnection();

        $sql = "SELECT * FROM turma WHERE id = :id";

        $stmt = $db->prepare($sql);

        $stmt->execute([':id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function actualizarTurma($dados)
    {

        /* echo "<pre>";
        print_r($dados);
        echo "</pre>";
        die(); */
        $db = Database::getConnection();

        $sql = "UPDATE turma 
        SET nome = :nome, 
        periodo = :periodo, 
        id_sala = :sala
        classe = :classe,
        WHERE id = :id";

        $stmt = $db->prepare($sql);

        return $stmt->execute([
            ':nome' => $dados['nome_turma'],
            ':periodo' => $dados['periodo_turma'],
            ':sala' => $dados['sala_turma'],
            ':classe' => $dados['classe'],
            ':id' => $dados['id_turma']
        ]);
    }

    public static function obterRegistro()
    {
        $db = Database::getConnection();

        $sql = "SELECT matricula.numero as numero_matricula,
        aluno.nome as nome_aluno, 
        turma.nome as nome_turma, 
        curso.nome as nome_curso
        FROM turma 
        JOIN matricula ON matricula.id_turma = turma.id 
        JOIN aluno ON aluno.id = matricula.id_aluno
        JOIN curso ON matricula.id_curso = curso.id";

        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function pegarAluno($id)
    {
        $db = Database::getConnection();

        $sql = "SELECT aluno.nome AS nome_aluno, 
        matricula.numero as numero_matricula, 
        turma.nome as nome_turma 
        FROM matricula 
        JOIN turma ON matricula.id_turma = turma.id
        join aluno ON aluno.id = matricula.id_aluno
        WHERE turma.id = :id";

        $stmt = $db->prepare($sql);

        $stmt->execute([
            ':id' =>$id,
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
