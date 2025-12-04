<?php 

namespace App\controllers;
use App\controllers\AuthController;
class ProfessorDashboardController{
    public function render(){
        AuthController::iniciarSessao();
        echo "Professor Dasboard";
    }
}