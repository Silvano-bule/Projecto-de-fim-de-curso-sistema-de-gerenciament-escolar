<?php

namespace App\controllers;

use App\controllers\AuthController;

class AdminDashboardController
{
    public function render()
    {
        AuthController::iniciarSessao();

        if(AuthController::isLogged() !== true){
            header("Location: index.php?page=entrar");
            exit;
        }

        if(!isset($_SESSION['user_tipo']) === 'admin'){
            header("Location: index.php?page=entrar");
            exit;
        }
        require_once __DIR__ . '/../views/adminDashboardView.php';
    }
}
