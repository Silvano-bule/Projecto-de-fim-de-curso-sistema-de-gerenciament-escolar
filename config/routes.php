<?php

use App\controllers\homeController;
use App\controllers\cadastrarController;
use App\controllers\entrarController;

define('AVAILABLE_ROUTES', [
    'home' => homeController::class,
    'cadastrar' => cadastrarController::class,
    'entrar' => entrarController::class
]);

define('DEFAULT_ROUTE', homeController::class);