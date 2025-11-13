<?php

namespace App\Models;

use App\core\Database;
use PDO;

class Usuarios
{

    public static function salvar($nome, $email, $senha)
    {
        $db = Database::getConnection();

        $query = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome,:email,:senha)";
        $stmt = $db->prepare($query);

        $senhaHash = password_hash($senha, PASSWORD_BCRYPT);
        
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senhaHash);

        return $stmt->execute();
    }

    public static function buscarPorEmail($email) {
        $db = Database::getConnection();

        $query = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $stmt -> fetch(PDO::FETCH_ASSOC);
    }
}
