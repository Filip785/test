<?php

namespace Filip785\MVC\Validator\Rules;

use Filip785\MVC\Validator\Rules\IRule;
use Filip785\MVC\Validator\Rules\BaseRule;

class Required extends BaseRule implements IRule
{
    public function run(string $value): bool
    {
        return trim($value) !== '';
    }

    public function getMessage()
    {
        return "Field " . $this->fieldName . ' is required.';
    }
}
