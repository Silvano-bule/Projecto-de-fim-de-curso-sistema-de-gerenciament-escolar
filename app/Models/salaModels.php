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
    public static function verificarSalaExitente($nome)
    {
        $db = Database::getConnection();

        $sql = "SELECT COUNT(*) FROM sala WHERE nome = :nome";

        $stmt = $db->prepare($sql);

        $stmt->execute([':nome' => $nome]);

        return $stmt->fetchColumn() > 0;
    }

    public static function listarSalas()
    {
        $db = Database::getConnection();

        $sql = "SELECT * FROM sala";

        $stmt = $db->query($sql);

        return $stmt->fetchAll();
    }
}
