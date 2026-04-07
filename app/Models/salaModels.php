<?php

namespace App\Models;

use App\core\Database;

class salaModels
{
    public  static function salvarDados($nome, $capacidade)
    {
        $db = Database::getConnection();

        $sql = "INSERT INTO sala(nome, capacidade) VALUES (:nome, :capacidade)";

        $stmt = $db->prepare($sql);

        $stmt->execute([
            ':nome' => $nome,
            ':capacidade' => $capacidade
        ]);
    }
}
