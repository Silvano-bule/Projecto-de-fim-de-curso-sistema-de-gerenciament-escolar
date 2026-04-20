<?php

namespace App\Models;

use App\core\Database;
use PDO;
use PDOException;

class Classe
{
    public static function guardarDados($nome)
    {
        $db = Database::getConnection();

        $msm = "INSERT INTO classe (nome) VALUES (:nome)";

        $stmt = $db->prepare($msm);

        $stmt->execute([
            ':nome' => $nome
        ]);

        return  $db->lastInsertId();
    }
    public static function classesExistente()
    {
        $db = Database::getConnection();
        $msm = "SELECT nome from classe";
        $stmt = $db->prepare($msm);
        $stmt->execute();

        $resultado  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
    public static function ligarCurso($idclasse, $idcurso)
    {
        $db = Database::getConnection();

        $msm = "INSERT INTO curso_classe (id_classe, id_curso)  VALUES (:idclasse,:idcurso)";

        $stmt = $db->prepare($msm);
        $stmt->execute(
            [
                ':idclasse' => $idclasse,
                ':idcurso' => $idcurso
            ]
        );
    }
    public static function contarClasses()
    {
        $db = Database::getConnection();
        $msm = "SELECT COUNT(*) as total from classe";
        $stmt = $db->prepare($msm);
        $stmt->execute();

        $resultado  = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['total'];
    }
    public static function classes()
    {
        $db = Database::getConnection();
        $msm = "SELECT * from classe";
        $stmt = $db->prepare($msm);
        $stmt->execute();

        $resultado  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
    public static function listarClasses()
    {
        $db = Database::getConnection();
        $sql = "SELECT * FROM classe";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function cursoTemAluno($id)
    {
        $db = Database::getConnection();

        $sql = "SELECT COUNT(*) FROM matricula WHERE id_classe = :id";

        $stmt = $db->prepare($sql);

        $stmt->execute([
            ':id' => $id
        ]);

        $resultado = $stmt->fetch();

        return $resultado['total'];
    }

    public static function removerClasse($id)
    {

        $db = Database::getConnection();

        $sql = "DELETE  FROM classe WHERE id = :id";

        $stmt = $db->prepare($sql);

        return $stmt->execute([':id' => $id]);
    }
    public static function obterClassePorId($id)
    {
        $db = Database::getConnection();

        $sql = "SELECT * FROM classe WHERE id = :id";

        $stmt = $db->prepare($sql);

        $stmt->execute([':id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

      public static function actualizarClasse($dados)
    {

        /* echo "<pre>";
        print_r($dados);
        echo "</pre>";
        die(); */
        $db = Database::getConnection();

        $sql = "UPDATE classe 
        SET nome = :nome
        WHERE id = :id";

        $stmt = $db->prepare($sql);

        return $stmt->execute([
            ':nome' => $dados['nome_classe'],
            ':id' => $dados['id_classe']
        ]);
    }
}
