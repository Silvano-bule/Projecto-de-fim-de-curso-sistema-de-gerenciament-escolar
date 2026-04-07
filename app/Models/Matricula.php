<?php

namespace App\Models;


use App\core\Database;
use PDO;

class Matricula
{
    public static function gerarMatricula()
    {

      /*   $db = Database::getConnection();
        $sql = "SELECT COUNT(*) as total from matricula";

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        $numeroMatricula = $resultado['total'] + 1;

        $anoAtual = date('Y');

        $sequencia = str_pad($numeroMatricula, 4, '0', STR_PAD_LEFT);
        return $anoAtual . "-" . $sequencia; */
    }
    public static function salvarMatricula($numero,  $idAluno, $turma)
    {
      /*   $db = Database::getConnection();

        $sql = "INSERT INTO matricula(numero_matricula, alunomatricula, turmamatriculada)  VALUES (:numero, :aluno, :turma)";

        $stmt = $db->prepare($sql);
        $stmt->execute(
            [
                ':numero' => $numero,
                ':aluno' => $idAluno,
                ':turma' => $turma
            ]
        );

        return $db->lastInsertId(); */
    }
    public static function listarAlunosComMatriculas()
    {
        /* $db = Database::getConnection();
        $sql = "SELECT aluno.idaluno, aluno.nome, matricula.numero_matricula 
                FROM aluno 
                LEFT JOIN matricula 
                ON aluno.idaluno = matricula.alunomatricula
                ORDER BY aluno.idaluno DESC
                limit 10";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC)*/
    } 
}
