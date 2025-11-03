<?php

require_once __DIR__ . '/../../config/routes.php';

$availableRouteNames = array_keys(AVAILABLE_ROUTES);

if (isset($_GET['page']) && in_array($_GET['page'], $availableRouteNames, true)) {
    $controller = AVAILABLE_ROUTES[$_GET['page']];
} else {
    $controller = DEFAULT_ROUTE;
}

require_once __DIR__ . '/../controllers/' . $controller;
