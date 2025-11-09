<?php
namespace App\core;
echo "Router.php loaded";
/* namespace App\core;
class Router{    
    public function route(){
     require_once __DIR__ . '../../../config/routes.php';

        $availableRoutersNames = array_keys(AVAILABLE_ROUTES);

        $page = $_GET['page'] ?? home;

        if(isset($page) && in_array($page, $availableRoutersNames, true)){

            $controller = AVAILABLE_ROUTES[$page];
        }
} */

/* require_once __DIR__ . '/../../config/routes.php';

$availableRouteNames = array_keys(routers::AVAILABLE_ROUTES);

if (isset($_GET['page']) && in_array($_GET['page'], $availableRouteNames, true)) {
    $controller = AVAILABLE_ROUTES[$_GET['page']];
} else {
    $controller = DEFAULT_ROUTE;
}

require_once __DIR__ . '/../controllers/' . $controller;
 */