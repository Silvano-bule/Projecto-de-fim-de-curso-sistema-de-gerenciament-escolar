<?php

namespace App\Models;

use App\core\Database;
use PDO;
use PDOException;

class Teacher
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
    public static function listarProfessores()
    {
        $db = Database::getConnection();
        $sql = "SELECT * FROM professor";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function removerProfessor($id)
    {
        try {
            $db = Database::getConnection();
            $sql = "DELETE FROM professor WHERE idprofessor = :id";
            $stmt = $db->prepare($sql);
            $stmt->execute([':id' => $id]);
        } catch (PDOException $e) {
            echo "Erro ao remover professor: " . $e->getMessage();
        }
    }

    public static function obterProfessorPorId($id)
    {
        $db =  Database::getConnection();

        $sql = "SELECT *  FROM professor  WHERE idprofessor = :id";

        $stmt  = $db->prepare($sql);

        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function actualizarProfessor($dados)
    {
      $db = Database::getConnection();

      $sql = "UPDATE professor SET nome = :nome, nascimento = :nascimento, sexo = :sexo, telefone = :telefone, email = :email, provincia = :provincia, nacionalidade = :nacionalidade WHERE idprofessor = :id";

      $stmt = $db ->prepare($sql);

      return $stmt ->execute([
        ':nome' => $dados['nome_professor'],
        ':email' => $dados['email_professor'],
        ':nascimento' => $dados['nascimento_professor'],
        ':sexo' => $dados['sexo_professor'],
        ':telefone' => $dados['telefone_professor'],
        ':provincia' => $dados['provincia_professor'],
        ':nacionalidade' => $dados['nacionalidade_professor'],
        ':id' => $dados['idProfessor']
      ]);
    }
}
