<?php

namespace Filip785\MVC\Models;

use Filip785\MVC\ORM\DB;

abstract class BaseModel
{
    public function __construct()
    {
        $this->tableName = strtolower((new \ReflectionClass($this))->getShortName()) . 's';
    }

    public function create($args)
    {
        return DB::table($this->tableName)->create($args);
    }
}
