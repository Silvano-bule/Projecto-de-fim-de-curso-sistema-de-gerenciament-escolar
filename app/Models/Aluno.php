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

            $sql = "INSERT INTO aluno (nome, email, telefone, nascimento, sexo, nacionalidade, nome_pai, nome_mae, numero_BI, provincia, altura) VALUES (:nome, :email, :telefone, :nascimento, :sexo, :nacionalidade, :nome_pai, :nome_mae, :numero_BI, :provincia, :altura)";
            $stmt = $db->prepare($sql);

            $result = $stmt->execute([
                ':nome' => $nome,
                ':email' => $email,
                ':telefone' => $telefone,
                ':nascimento' => $nascimento,
                ':sexo' => $sexo,
                ':nacionalidade' => $nacionalidade,
                ':nome_pai' => $nome_pai,
                ':nome_mae' => $nome_mae,
                ':numero_BI' => $numero_BI,
                ':provincia' => $provincia,
                ':altura' => $altura
            ]);

            if ($result) {
                return $db->lastInsertId();
            } else {
                throw new \Exception("Falha ao executar query de inserção");
            }
        } catch (\PDOException $e) {
            throw new \Exception("Erro ao salvar no banco (" . $e->getFile() . ":" . $e->getLine() . "): " . $e->getMessage());
        } catch (\Exception $e) {
            throw new \Exception("Erro geral ao salvar aluno (" . $e->getFile() . ":" . $e->getLine() . "): " . $e->getMessage());
        }
    }

    public static function listarAlunos()
    {
        $db = Database::getConnection();
        $sql = "SELECT * FROM aluno";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function ligarAluno($idAluno)
    {
        $db = Database::getConnection();
        $sql  = "INSERT INTO aluno (usuario_id) VALUES (:id_usuario)";
        $stmt = $db->prepare($sql);
        $stmt->execute(
            [
                ':id_usuario' => $idAluno
            ]
        );
    }
    public static function listarAlunosRecentes()
    {
        $db = Database::getConnection();

        $sql = "SELECT aluno.nome, matricula.numero from aluno join matricula on aluno.id = matricula.id_aluno";
        $stmt  = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function removerAluno($id)
    {
        $db = Database::getConnection();

        $sql1 =  "DELETE FROM matricula WHERE alunomatricula = :id";
        $stmt1 = $db->prepare($sql1);
        $stmt1->execute([
            ':id' => $id
        ]);

        $sql = "DELETE FROM aluno WHERE idaluno = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
    }
    public static function obterAlunoPorId($id)
    {
        $db = Database::getConnection();

        $sql = "SELECT * FROM aluno WHERE idaluno = :id";

        $stmt =  $db->prepare($sql);

        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function actualizarAluno($dados)
    {
        $db = Database::getConnection();

        $sql = "UPDATE  aluno  SET nome = :nome_aluno, email = :email_aluno, telefone = :telefone_aluno, nascimento = :nascimento_aluno, sexo = :sexo_aluno, nacionalidade = :nacionalidade_aluno, nome_pai = :pai_aluno,nome_mae = :mae_aluno, numero_bi = :numero_BI_aluno, provincia = :provincia_aluno, altura = :altura_aluno, id_turma=:turma_aluno, id_curso =  :curso_aluno, id_classe = :classe_aluno, sala = :sala_aluno WHERE idaluno = :idaluno";

        $stmt = $db->prepare($sql);

        return $stmt->execute([
            ':idaluno' => $dados['idaluno'],
            ':nome_aluno' => $dados['nome_aluno'],
            ':email_aluno' => $dados['email_aluno'],
            ':telefone_aluno' => $dados['telefone_aluno'],
            ':nascimento_aluno' => $dados['nascimento_aluno'],
            ':sexo_aluno' => $dados['sexo_aluno'],
            ':nacionalidade_aluno' => $dados['nacionalidade_aluno'],
            ':pai_aluno' => $dados['pai_aluno'],
            ':mae_aluno' => $dados['mae_aluno'],
            ':numero_BI_aluno' => $dados['numero_BI_aluno'],
            ':provincia_aluno' => $dados['provincia_aluno'],
            ':altura_aluno' => $dados['altura_aluno'],
            ':turma_aluno' => $dados['turma_aluno'],
            ':curso_aluno' => $dados['curso'],
            ':classe_aluno' => $dados['classe_aluno'],
            ':sala_aluno' => $dados['sala'],
        ]);
    }
}
