<?php

namespace Filip785\MVC\Validator\Rules;

class BaseRule
{
    protected string $fieldName;

    public function __construct($fieldName)
    {
        $this->fieldName = $fieldName;
    }
}
