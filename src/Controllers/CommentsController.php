<?php

namespace Filip785\MVC\Controllers;

use Filip785\MVC\Controllers\BaseController;
use Filip785\MVC\Validator\Validator;
use Filip785\MVC\ORM\DB;

class CommentsController extends BaseController
{
    public function create()
    {
        $validator = new Validator();

        $validationResult = $validator->validate($_POST, [
            'email' => 'required|email',
            'name' => 'required',
            'message' => 'required'
        ]);

        if (!$validationResult) {
            $this->redirect('/products');
            return;
        }

        // populate the database
        DB::table('comments')->create($_POST);

        $this->redirect('/products');
    }
}
