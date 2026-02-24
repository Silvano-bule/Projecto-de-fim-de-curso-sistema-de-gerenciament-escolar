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

    public static function guardarCurso($nome_curso, $area_tecnica_curso, $estado)
    {
        $db = Database::getConnection();

        $sql = "INSERT INTO curso (nome, area, estado) VALUES (:nome, :area, :estado)";

        $stmt = $db->prepare($sql);

        
        $stmt->execute(
            [
                ':nome' => $nome_curso,
                ':area' => $area_tecnica_curso,
                ':estado' => $estado
            ]
        );
    }

    public static function listarCursos(){
        $db = Database::getConnection();
        $sql = "SELECT * FROM curso";
        $stmt = $db-> prepare($sql);
        $stmt->execute();
        return $stmt-> fetchAll(PDO::FETCH_ASSOC);
    }
}
