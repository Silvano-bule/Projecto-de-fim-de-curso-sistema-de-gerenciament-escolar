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

    public static function guardarTurma($nome_turma, $periodo_turma, $sala)
    {
        $db = Database::getConnection();

        $sql = "INSERT INTO turma(nome, periodo, id_sala) VALUES(:nome, :periodo, :sala)";

        $stmt = $db->prepare($sql);

        $stmt->execute([
            ':nome' => $nome_turma,
            ':periodo' => $periodo_turma,
            ':sala' => $sala
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

        $sql = "SELECT COUNT(*) as total FROM aluno  WHERE id_turma = :idTurma";

        $stmt = $db->prepare($sql);

        $stmt->execute([':idTurma' => $idTurma]);

        $resultado = $stmt->fetch();

        return $resultado['total'];
    }

    public static  function removerTurma($id)
    {
        $db = Database::getConnection();

        $sql = "DELETE FROM turma WHERE idturma = :id";

        $stmt = $db->prepare($sql);

        return $stmt->execute([':id' => $id]);
    }
    public static function obterTurmaPorId($id)
    {
        $db = Database::getConnection();

        $sql = "SELECT * FROM turma WHERE idturma = :id";

        $stmt = $db->prepare($sql);

        $stmt->execute([':id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function actualizarTurma($dados)
    {
        $db = Database::getConnection();

        $sql = "UPDATE turma SET nome = :nome, periodo = :periodo, sala = :sala, capacidade = :capacidade WHERE idturma = :id";

        $stmt = $db->prepare($sql);

        return $stmt->execute([
            ':nome' => $dados['nome_turma'],
            ':periodo' => $dados['periodo_turma'],
            ':sala' => $dados['sala_turma'],
            ':capacidade' => $dados['capacidade_turma'],
            ':id' => $dados['idTurma']
        ]);
    }
}
