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
    public static function salvarAluno($nome, $email, $telefone, $nascimento, $sexo, $nacionalidade, $nome_pai, $nome_mae, $numero_BI, $provincia, $altura, $turma, $curso, $classe, $sala)
    {
        try {
            $db = Database::getConnection();

            $sql = "INSERT INTO aluno (nome, email, telefone, nascimento, sexo, nacionalidade, nome_pai, nome_mae, numero_BI, provincia, altura, id_turma, id_curso, id_classe, sala) VALUES (:nome, :email, :telefone, :nascimento, :sexo, :nacionalidade, :nome_pai, :nome_mae, :numero_BI, :provincia, :altura, :turma, :curso, :classe, :sala)";
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
                ':altura' => $altura,
                ':turma' => $turma,
                ':curso' => $curso,
                ':classe' => $classe,
                ':sala' => $sala
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

        $sql = "SELECT 
        aluno.*,
        matricula.numero_matricula
        FROM aluno
        LEFT JOIN matricula 
        ON aluno.idaluno = matricula.alunomatricula
        ORDER BY aluno.idaluno DESC
        LIMIT 3";

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
    public  static function atualizarAluno($dados)
    {
        try {
            $db = Database::getConnection();

            $sql = " UPDATE aluno SET nome = :nome, email = :email, telefone = :telefone, nascimento = :nascimento, sexo = :sexo, nacionalidade = :nacionalidade, nome_pai = :nome_pai, nome_mae = :nome_mae, numero_BI = :numero_BI, provincia = :provincia, altura = :altura, id_turma = :turma, id_curso = :curso, id_classe = :classe, sala = :sala WHERE idaluno = :id";

            $stmt = $db->prepare($sql);

            $result = $stmt->execute([
                ':id' => $dados['idaluno'] ?? null,
                ':nome' => $dados['nome_aluno'] ?? null,
                ':email' => $dados['email_aluno'] ?? null,
                ':telefone' => $dados['telefone_aluno'] ?? null,
                ':nascimento' => $dados['nascimento_aluno'] ?? null,
                ':sexo' => $dados['sexo_aluno'] ?? null,
                ':nacionalidade' => $dados['nacionalidade_aluno'] ?? null,
                ':nome_pai' => $dados['pai_aluno'] ?? null,
                ':nome_mae' => $dados['mae_aluno'] ?? null,
                ':numero_BI' => $dados['numero_BI_aluno'] ?? null,
                ':provincia' => $dados['provincia_aluno'] ?? null,
                ':altura' => $dados['altura_aluno'] ?? null,
                ':classe' => $dados['classe_aluno'] ?? null,
                ':turma' => $dados['turma_aluno'] ?? null,
                ':curso' => $dados['curso'] ?? null,
                ':sala' => $dados['sala'] ?? null,
            ]);

            if (!$result) {
                throw new \Exception("Falha na execução da query: " . print_r($stmt->errorInfo(), true));
            }

            return true;
        } catch (\PDOException $e) {
            error_log("Erro PDO ao atualizar aluno (" . $e->getFile() . ":" . $e->getLine() . "): " . $e->getMessage());
            throw new \Exception("Erro PDO ao atualizar aluno (" . $e->getFile() . ":" . $e->getLine() . "): " . $e->getMessage());
        } catch (\Exception $e) {
            error_log("Erro geral ao atualizar aluno (" . $e->getFile() . ":" . $e->getLine() . "): " . $e->getMessage());
            throw new \Exception("Erro geral ao atualizar aluno (" . $e->getFile() . ":" . $e->getLine() . "): " . $e->getMessage());
        }
    }

    public static function obterAlunoPorId($id)
    {
        try {
            $db = Database::getConnection();
            $sql = "SELECT * FROM aluno WHERE idaluno = :id";
            $stmt = $db->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao obter aluno: " . $e->getMessage());
            return null;
        }
    }
}
