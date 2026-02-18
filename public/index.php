<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../vendor/autoload.php';


use App\core\Router;
use App\core\Session;
use App\controllers\AuthController;
use App\controllers\TurmaAlunoController;

AuthController::iniciarSessao();

$router = new Router();
$router->route();
