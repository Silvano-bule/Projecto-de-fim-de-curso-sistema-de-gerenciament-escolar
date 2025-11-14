<?php

use App\controllers\homeController;
use App\controllers\cadastrarController;
use App\controllers\dashboardController;
use App\controllers\entrarController;

define('AVAILABLE_ROUTES', [
    'home' => homeController::class,
    'cadastrar' => cadastrarController::class,
    'entrar' => entrarController::class,
    'dashboard' => dashboardController::class
]);

define('DEFAULT_ROUTE', homeController::class);