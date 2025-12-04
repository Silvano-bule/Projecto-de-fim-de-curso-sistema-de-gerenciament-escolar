<?php

namespace App\controllers;

use App\controllers\AuthController;

class AdminDashboardController
{
    public function render()
    {
        AuthController::iniciarSessao();
        require_once __DIR__ . '/../views/adminDashboardView.php';
    }
}
