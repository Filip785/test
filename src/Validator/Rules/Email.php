<?php

namespace Filip785\MVC\Validator\Rules;

use Filip785\MVC\Validator\Rules\IRule;
use Filip785\MVC\Validator\Rules\BaseRule;

class Email extends BaseRule implements IRule
{
    public function run(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public function getMessage()
    {
        return "Email address needs to be in correct format.";
    }
}
