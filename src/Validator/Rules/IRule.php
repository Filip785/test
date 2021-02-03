<?php

namespace Filip785\MVC\Validator\Rules;

interface IRule
{
    public function run(string $value): bool;
}
