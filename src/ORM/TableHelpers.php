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
}
