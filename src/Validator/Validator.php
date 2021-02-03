<?php

namespace Filip785\MVC\Validator;

class Validator
{
    private $errors = [];

    public function validate($args, $rules)
    {
        foreach ($rules as $key => $rule) {
            $ruleList = explode('|', $rule);
            $dataValue = $args[$key];

            foreach ($ruleList as $rule) {
                $ruleInstance = ValidatorFactory::create($rule, $key);
                $result = $ruleInstance->run($args[$key]);

                if (!$result) {
                    $this->errors[$key] = $ruleInstance->getMessage();
                    break;
                }
            }
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
