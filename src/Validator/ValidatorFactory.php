<?php

namespace Filip785\MVC\Validator;

use Filip785\MVC\Validator\Rules\IRule;
use Filip785\MVC\Validator\Rules\Required;
use Filip785\MVC\Validator\Rules\Email;

class ValidatorFactory
{
    public static function create($rule, $fieldName)
    {
        if ($rule === 'required') {
            return new Required($fieldName);
        }

        if ($rule === 'email') {
            return new Email($fieldName);
        }
    }
}
