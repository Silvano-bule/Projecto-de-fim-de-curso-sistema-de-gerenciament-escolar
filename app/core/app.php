<?php

/* Aqui fica toda logica de rotemento */
require __DIR__ .'/controller.php';

$availableNamesrouters = array_keys(AVALAIBLE_ROUTERS);

if (isset($_GET['page']) && in_array($_GET['page'], $availableNamesrouters)) {
    $controller = AVALAIBLE_ROUTERS[$_GET['page']];
} else {
    $controller = DEFAULT_ROUTE;
}
require  dirname(__DIR__, 1) . '/../app/controllers/' . $controller;
