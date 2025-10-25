<?php 

use App\controllers\homeController\page;


require 'vendor/autoload.php';

require  "App/controllers/homeController/page.php";

$classe = new page();

return $classe->getDates();