<?php

namespace Filip785\MVC\Validator;

class Validator
{
    public function validate($args, $rules)
    {
        // foreach ($rules as $key => $rule) {
        //     $ruleList = explode('|', $rule);
        //     $dataValue = $args[$key];
        //     dd($dataValue, $key, $ruleList);
        //}

        //dd($args, $rules);

        //$this->sendErrors();

        return true;
    }

    private function sendErrors()
    {
        session_start();
        $_SESSION['errors'] = [
            'name' => 'Please enter your name.',
            'email' => 'Please enter your email.',
            'message' => 'Please enter your message.'
        ];
    }
}
