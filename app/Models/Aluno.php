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
    public static function salvarAluno($nome, $email, $telefone, $nascimento, $sexo, $nacionalidade, $nome_pai, $nome_mae, $numero_BI, $provincia, $altura)
    {
        try {
            $db = Database::getConnection();

            $sql = "INSERT INTO aluno (nome, email, telefone, nascimento, sexo, nacionalidade, nome_pai,nome_mae, numero_BI, provincia, altura) VALUES (:nome, :email, :telefone, :nascimento, :sexo, :nacionalidade, :nome_pai, :nome_mae, :numero_BI, :provincia, :altura)";

            $stmt = $db->prepare($sql);

            $stmt->execute([
                ':nome' => $nome,
                ':email' => $email,
                ':telefone' =>  $telefone,
                ':nascimento' => $nascimento,
                ':sexo' => $sexo,
                ':nacionalidade' => $nacionalidade,
                ':nome_pai' => $nome_pai,
                ':nome_mae' => $nome_mae,
                ':numero_BI' => $numero_BI,
                ':provincia' => $provincia,
                ':altura' => $altura
            ]);
        } catch (PDOException $e) {
            echo "Erro ao salvar no banco: " . $e->getMessage();
        }
    }
}
