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
        $db = Database::getConnection();
        try {
            $db->beginTransaction();

            $sql = "INSERT INTO aluno (nome, email, telefone, nascimento, sexo, nacionalidade, nome_pai, nome_mae, numero_BI, provincia, altura) VALUES (:nome, :email, :telefone, :nascimento, :sexo, :nacionalidade, :nome_pai, :nome_mae, :numero_BI, :provincia, :altura)";
            $stmt = $db->prepare($sql);

            $stmt->execute([
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

            $idAluno = $db->lastInsertId();
            $db->commit();
            return $idAluno;
        } catch (PDOException $e) {
            throw new \Exception("Erro ao salvar no banco (" . $e->getFile() . ":" . $e->getLine() . "): " . $e->getMessage());
        } catch (\Exception $e) {
            throw new \Exception("Erro geral ao salvar aluno (" . $e->getFile() . ":" . $e->getLine() . "): " . $e->getMessage());
        }
    }
    public static function matricula($IdAluno, $Idturma, $Idsala, $Idcurso)
    {
        $db = Database::getConnection();

        // A query tem 6 marcadores
        $sql = "INSERT INTO matricula (numero, Id_aluno, Id_turma, Id_sala, Id_curso) 
            VALUES (:numero, :IdAluno, :Idturma, :Idsala, :Idcurso)";

        $stmt = $db->prepare($sql);
        $numeroMatricula = uniqid("MAT");

        $stmt->execute([
            ':numero'   => $numeroMatricula,
            ':IdAluno'  => $IdAluno,   // Corrigido: era IdAaluno
            ':Idturma'  => $Idturma,
            ':Idsala'   => $Idsala,    // Adicionado: estava a faltar
            ':Idcurso'  => $Idcurso
        ]);
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

        $sql = "SELECT aluno.nome, aluno.nascimento,
        matricula.numero,
        matricula.id_turma,
        turma.id_sala,
        turma.nome as nome_turma,
        sala.nome as nome_sala
        from aluno 
        join matricula on aluno.id = matricula.id_aluno
        join turma on turma.id = matricula.id_turma
        join sala on sala.id = turma.id_sala";

        $stmt  = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function removerAluno($id)
    {
        $db = Database::getConnection();

        $sql1 =  "DELETE FROM matricula WHERE id_aluno = :id";
        $stmt1 = $db->prepare($sql1);
        $stmt1->execute([
            ':id' => $id
        ]);

        $sql = "DELETE FROM aluno WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
    }
    public static function obterAlunoPorId($id)
    {
        $db = Database::getConnection();

        $sql = "SELECT 
                aluno.id,
                aluno.nome,
                aluno.email,
                aluno.telefone,
                aluno.nascimento,
                aluno.sexo,
                aluno.nacionalidade,
                aluno.nome_pai,
                aluno.nome_mae,
                aluno.numero_BI,
                aluno.provincia,
                aluno.altura,
                matricula.id_turma,
                matricula.id_curso
                FROM aluno 
                LEFT JOIN matricula 
                ON aluno.id = matricula.id_aluno
                WHERE aluno.id = :id";

        $stmt =  $db->prepare($sql);

        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function actualizarAluno($dados)
    {
        /*  echo "<pre>";
    print_r($dados); // Isso vai mostrar o que está tentando gravar
    echo "</pre>";
    die(); */
        try {
            $db = Database::getConnection();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Força o erro aparecer

            // 1. Atualizar Tabela Aluno
            $sql = "UPDATE aluno SET 
                nome = :nome_aluno, 
                email = :email_aluno, 
                telefone = :telefone_aluno, 
                nascimento = :nascimento_aluno, 
                sexo = :sexo_aluno, 
                nacionalidade = :nacionalidade_aluno, 
                nome_pai = :pai_aluno, 
                nome_mae = :mae_aluno, 
                numero_BI = :numero_BI_aluno, 
                provincia = :provincia_aluno, 
                altura = :altura_aluno 
                WHERE id = :idAluno";

            $stmt = $db->prepare($sql);
            $stmt->execute([
                ':idAluno'           => $dados['idaluno'],
                ':nome_aluno'        => $dados['nome_aluno'],
                ':email_aluno'       => $dados['email_aluno'],
                ':telefone_aluno'    => $dados['telefone_aluno'],
                ':nascimento_aluno'  => $dados['nascimento_aluno'],
                ':sexo_aluno'        => $dados['sexo_aluno'],
                ':nacionalidade_aluno' => $dados['nacionalidade_aluno'],
                ':pai_aluno'         => $dados['pai_aluno'],
                ':mae_aluno'         => $dados['mae_aluno'],
                ':numero_BI_aluno'   => $dados['numero_BI_aluno'],
                ':provincia_aluno'   => $dados['provincia_aluno'],
                ':altura_aluno'      => $dados['altura_aluno']
            ]);

            // 2. Atualizar Tabela Matricula
            $sqlMatricula = "UPDATE matricula SET 
                         id_turma = :turma_aluno, 
                         id_curso = :curso_aluno,
                         WHERE id_aluno = :idaluno";

            $stmtM = $db->prepare($sqlMatricula);
            $stmtM->execute([
                ':idaluno'      => $dados['idaluno'],
                ':turma_aluno'  => $dados['turma_aluno'],
                ':curso_aluno'  => $dados['curso_aluno']
            ]);
        } catch (PDOException $e) {
            // Se houver erro no nome de alguma coluna, ele vai mostrar aqui
            die("Erro Crítico no Banco de Dados: " . $e->getMessage());
        }
    }

    /* public static function actualizarmatricula($dados)
    {
        $db = Database::getConnection();
    } */
}
