<?php

namespace Filip785\MVC\ORM;

use Filip785\MVC\ORM\Table;

class DB
{
    private static $pdo;

    public static function table(string $tableName)
    {
        Table::setPDO(self::$pdo);

        return new Table($tableName);
    }

    public static function connect($dbConfig)
    {
        try {
            $connectionString = 'mysql:host=' . $dbConfig['db_host'] . ';dbname=' . $dbConfig['db_name'] . '';

            $dbh = new \PDO($connectionString, $dbConfig['username'], $dbConfig['password']);

            self::$pdo = $dbh;
        } catch (\PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public static function getInstance()
    {
        return self::$pdo;
    }
}
