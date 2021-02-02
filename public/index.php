<?php

use Filip785\MVC\Loaders\RoutingLoader;
use Filip785\MVC\Loaders\DatabaseLoader;

$dir = dirname(__DIR__);

require $dir . '/vendor/autoload.php';

DatabaseLoader::loadDB($dir . './src/config/database.php');
RoutingLoader::loadMVCRoutes($dir . './src/config/routes.php');
