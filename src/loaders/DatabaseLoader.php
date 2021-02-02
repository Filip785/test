<?php

namespace Filip785\MVC\Loaders;

use Filip785\MVC\ORM\DB;

class DatabaseLoader
{
    public static function loadDB(string $dbConfigPath)
    {
        if (!file_exists($dbConfigPath)) {
            return;
        }

        $dbConfig = include $dbConfigPath;

        DB::connect($dbConfig);
    }
}
