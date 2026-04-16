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

    public static function obterCursoId($idCurso)
    {
        $db = Database::getConnection();

        $sql  = "SELECT * FROM curso WHERE idcurso = :idCurso";

        $stmt = $db->prepare($sql);

        $stmt->execute([
            'idCurso' => $idCurso,
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
