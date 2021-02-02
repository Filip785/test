<?php

namespace Filip785\MVC\Loaders;

use Filip785\MVC\ORM\DB;

class DatabaseLoader
{
    public static function loadDB(string $dbConfigPath)
    {
        if (!file_exists($dbConfigPath)) {
            if (php_sapi_name() === 'cli') {
                echo "You are running CLI mode. Please create database.php in src/config/ by copying database.example.php into database.php.\n";
            }

            return;
        }

        $dbConfig = include $dbConfigPath;

        DB::connect($dbConfig);
    }
}
