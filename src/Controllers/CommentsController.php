<?php

namespace Filip785\MVC\Controllers;

use Filip785\MVC\Controllers\BaseController;
use Filip785\MVC\Validator\Validator;
use Filip785\MVC\ORM\DB;
use Filip785\MVC\Helpers\Authorize;

class CommentsController extends BaseController
{
    public function create()
    {
        $validator = new Validator();

        $validator->validate($_POST, [
            'email' => 'required|email',
            'name' => 'required',
            'message' => 'required'
        ]);

        if (count($validator->getErrors()) > 0) {
            $this->setErrors($validator->getErrors());
            $this->setValues($_POST);
            $this->redirect('/products');

            return;
        }

        // populate the database
        DB::table('comments')->create($_POST);

        $this->redirect('/products');
    }

    public function allow($comment_id)
    {
        if (!Authorize::verify()) {
            $this->redirect('/dashboard/login');
        }

        DB::table('comments')->updateWhere(['id' => $comment_id], ['is_allowed' => 1]);

        $this->redirect('/dashboard');
    }

    public function disallow($comment_id)
    {
        if (!Authorize::verify()) {
            $this->redirect('/dashboard/login');
        }

        DB::table('comments')->delete($comment_id);

        $this->redirect('/dashboard');
    }
}
