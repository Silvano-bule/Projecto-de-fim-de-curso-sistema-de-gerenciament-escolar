<?php 

namespace App\Models;

use App\core\Database;
use PDO;

class Turma
{
    public static function contarTurmas(){
        $db = Database::getConnection();
        $msm = "SELECT COUNT(*) as total from turma";
        $stmt = $db->prepare($msm);
        $stmt->execute();

        $resultado  = $stmt -> fetch(PDO::FETCH_ASSOC);
        return $resultado['total'];
    }

    public static function guardarTurma($nome_turma, $periodo_turma, $sala_turma, $capacidade_turma){
          $db = Database::getConnection();

        $sql = "INSERT INTO turma(nome, periodo, sala, capacidade) VALUES(:nome, :periodo, :sala, :capacidade)";

        $stmt = $db->prepare($sql);

        $stmt->execute([
            ':nome' => $nome_turma,
            ':periodo' => $periodo_turma,
            ':sala' => $sala_turma,
            ':capacidade' => $capacidade_turma
        ]);
    }
}