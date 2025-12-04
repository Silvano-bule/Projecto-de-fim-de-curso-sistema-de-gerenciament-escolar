<?php 

namespace App\controllers;
use App\controllers\AuthController;
class dashboardController
{
    public function render()
    {
        AuthController::iniciarSessao();

        if(!AuthController::isLogged()){
            header("Location: index.php?page=entrar");
            exit;
        }

        
    }
}