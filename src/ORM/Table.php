<?php

namespace Filip785\MVC\ORM;

use Filip785\MVC\ORM\TableHelpers;

class Table
{
    private string $tableName;
    private static $pdo;

    public function __construct($tableName)
    {
        $this->tableName = $tableName;
    }

    public function all()
    {
        $query = self::$pdo->prepare("SELECT * FROM `" . $this->tableName . "`");

        $query->execute();
        $result = $query->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function create($args)
    {
        $insertStr = TableHelpers::getInsertStr($args);
        $query = self::$pdo->prepare("INSERT INTO `" . $this->tableName . "` $insertStr");

        $query->execute(array_values($args));
    }

    public static function setPDO($pdo)
    {
        if (self::$pdo) {
            return;
        }

        self::$pdo = $pdo;
    }
}
