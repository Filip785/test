<?php

namespace Filip785\MVC\Loaders;

// Loads route file.
class RoutingLoader
{
    public static function loadMVCRoutes(string $routesPath)
    {
        if (!file_exists($routesPath)) {
            dd("Routes file does not exist. There needs to be routes file in $routesPath.");
        }

        include dirname(__DIR__) . '../config/routes.php';
    }
}
