<?php

namespace App\core;

use App\controllers\cadastrarController;
use App\controller\entrarController;
use App\controllers\homeController;
use App\controllers\dashboardController;

class Router
{
    public function route()
    {
        require_once __DIR__ . '/../../config/routes.php';

        $availableRouteNames = array_keys(AVAILABLE_ROUTES);
        $page = $_GET['page'] ?? 'home';

        if (in_array($page, $availableRouteNames, true)) {
            $controller = AVAILABLE_ROUTES[$page];
        } else {
            $controller = DEFAULT_ROUTE;
        }

        $controllerInstance = new $controller();

        if (!method_exists($controllerInstance, 'render')) {
            throw new \Exception("O controlador selecionado não possui o método render.");
        }
        $controllerInstance->render();
    }
}
