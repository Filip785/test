<?php
use Filip785\MVC\Loaders\RoutingLoader;

$dir = dirname(__DIR__);

require $dir . '/vendor/autoload.php';

RoutingLoader::loadMVCRoutes($dir . './src/config/routes.php');
