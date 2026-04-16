<?php

namespace App\Models;

use App\core\Database;
use PDO;

class Usuarios
{
    public static function salvar($nome, $email, $senha, $tipo)
    {
        $db = Database::getConnection();

        $query = "INSERT INTO usuario (nome, email, senha, tipo) VALUES (:nome,:email,:senha, :tipo)";
        $stmt = $db->prepare($query);

        $senhaHash = password_hash($senha, PASSWORD_BCRYPT);


         $stmt->execute([
            ':nome'  => $nome,
            ':email' => $email,
            ':senha' => $senhaHash,
            ':tipo'  => $tipo
        ]);

        return $db->lastInsertId();
    }

    public static function buscarPorEmail($email)
    {
        $db = Database::getConnection();

        $query = "SELECT * FROM usuario WHERE email = :email";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function contarUsuarios()
    {
        $db = Database::getConnection();

        $sql = "SELECT COUNT(*) as total from usuario";

        $stmt =  $db->prepare($sql);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['total'];
    }

    public static function listarUsuarios()
    {
        $db = Database::getConnection();
        $insert = "SELECT * from usuario";
        $stmt = $db->prepare($insert);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
