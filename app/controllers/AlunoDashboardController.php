<?php 

namespace App\controllers;
use App\controllers\AuthController;

class AlunoDashboardController{
    public function render(){
        AuthController::iniciarSessao();
        echo "Usuario Dasbord";
    }
}