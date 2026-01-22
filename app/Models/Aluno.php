<?php

namespace App\Models;

use App\core\Database;
use PDO;
use PDOException;

class Aluno
{
    public static function contarAlunos()
    {
        $db = Database::getConnection();

        $msm = "SELECT COUNT(*) AS total from aluno";

        $stmt = $db->prepare($msm);
        $stmt->execute();

        $resultado  = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['total'];
    }
    public static function salvarAluno($nome, $address)
    {
        try {
            $db = Database::getConnection();

            $sql = "INSERT INTO aluno (nome, email) VALUES (:nome, :address)";

            $stmt = $db->prepare($sql);

            $stmt->execute([
                ':nome' => $nome,
                ':address' => $address
            ]);
        } catch (PDOException $e) {
            echo "Erro ao salvar no banco: " . $e->getMessage();
        }
    }
}
