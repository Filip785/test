<?php

namespace Filip785\MVC\ORM;

class TableHelpers
{
    public static function getInsertStr($args)
    {
        $propNames = '(';
        $valueQuestions = '(';

        foreach ($args as $k => $arg) {
            $propNames .= $k;
            $valueQuestions .= '?';

            if (!($k === array_key_last($args))) {
                $propNames .= ',';
                $valueQuestions .= ',';
            }
        }

        $propNames .= ')';
        $valueQuestions .= ')';

        return "$propNames VALUES $valueQuestions";
    }

    public static function getUpdateStr($args)
    {
        $statement = '';

        foreach ($args as $k => $arg) {
            $statement .= $k . ' = ?';

            if (!($k === array_key_last($args))) {
                $statement .= ',';
            }
        }

        return $statement;
    }

    public static function getWhereStr($args)
    {
        $statement = '';

        foreach ($args as $k => $arg) {
            $statement .= $k . ' = ?';

            if (!($k === array_key_last($args))) {
                $statement .= ' AND ';
            }
        }

        return $statement;
    }
}
