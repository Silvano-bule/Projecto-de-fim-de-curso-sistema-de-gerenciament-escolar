<?php

namespace App\Models;

use App\core\Database;
use PDO;

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

    public static function salaTemTurma($idSala)
    {
        $db = Database::getConnection();

        $sql = "SELECT count(*) as total FROM turma WHERE id_sala = :id";

        $stmt = $db->prepare($sql);

        $stmt->execute([':id' => $idSala]);

        $resultado = $stmt->fetch();

        return $resultado['total'];
    }
    public static function removerSala($idSala)
    {
        $db = Database::getConnection();

        $sql = "DELETE FROM sala WHERE id = :id";

        $stmt = $db->prepare($sql);

        $stmt->execute([':id' => $idSala]);
    }
    public static function obterSalaPorId($id)
    {
        $db = Database::getConnection();

        $sql = "SELECT * FROM sala WHERE id = :id";

        $stmt = $db->prepare($sql);

        $stmt->execute([':id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function actualizarSala($dados)
    {

        /* echo "<pre>";
        print_r($dados);
        echo "</pre>";
        die(); */
        $db = Database::getConnection();

        $sql = "UPDATE sala 
        SET nome = :nome,
        capacidade = :capacidade
        WHERE id = :id";

        $stmt = $db->prepare($sql);

        return $stmt->execute([
            ':nome' => $dados['nome_sala'],
            ':capacidade' => $dados['capacidade_sala'],
            ':id' => $dados['id_sala']
        ]);
    }
}
