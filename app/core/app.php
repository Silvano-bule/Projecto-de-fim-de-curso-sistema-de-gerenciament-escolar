<?php

/* Aqui fica toda logica de rotemento */
require './public/index.php';

$availableNamesrouters = array_keys(AVALAIBLE_ROUTERS);

if (isset($_GET['page']) && in_array($_GET['page'], $availableNamesrouters)) {
    $controller = AVALAIBLE_ROUTERS[$_GET['page']];
}else{
    $controller = DEFAULT_ROUTE;
}
require __DIR__ . '/../app/controllers/'. $controller;