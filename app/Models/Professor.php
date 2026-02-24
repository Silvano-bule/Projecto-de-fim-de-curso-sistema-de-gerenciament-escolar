<?php

namespace App\Models;

use App\core\Database;
use PDO;
use PDOException;

class Professor
{
    public static function contarProfessores()
    {
        $db = Database::getConnection();

        $msm = "SELECT COUNT(*) AS total from professor";
        $stmt = $db->prepare($msm);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['total'];
    }
    public static  function guardarDados($nome, $email, $telefone, $nascimento, $sexo, $nacionalidade, $provincia)
    {
        try {
            $db = Database::getConnection();
            $sql = "INSERT INTO professor (nome, nascimento , sexo,  telefone, email, provincia, nacionalidade) VALUES (:nome, :nascimento, :sexo, :telefone, :email, :provincia, :nacionalidade)";

            $stmt = $db->prepare($sql);

            $stmt->execute([
                ':nome' => $nome,
                ':email' => $email,
                ':telefone'  => $telefone,
                ':nascimento' => $nascimento,
                ':sexo' => $sexo,
                ':nacionalidade' =>  $nacionalidade,
                ':provincia' => $provincia
            ]);
        } catch (PDOException $e) {
            echo "ERRO AO SALVAR NO BANCO: " . $e->getMessage();
        }
    }
}
