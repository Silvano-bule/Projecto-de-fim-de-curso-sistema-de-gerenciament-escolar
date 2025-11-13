<?php

namespace App\controllers;

use App\Models\Usuarios;

class entrarController
{
    public function render()
    {
        $error = [];
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $senha = trim($_POST['senha'] ?? '');

            if (empty($email)) $error[] = "Email é obrigatório.";
            if (empty($senha)) $error[] = "Senha é obrigatória.";

            if (empty($error)) {
                $usuario = Usuarios::buscarPorEmail($email);
                
                if (!$usuario || !password_verify($senha, $usuario['senha'])) {
                    $error[] = "Email ou senha inválidos.";
                } else {
                    // Login bem-sucedido
                    header('Location: index.php?page=paineldashboard');
                    exit;
                }
            }
        }
        
        require_once __DIR__ . '/../views/entrarViews.php';
    }
}
