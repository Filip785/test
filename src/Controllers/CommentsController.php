<?php

namespace Filip785\MVC\Controllers;

use Filip785\MVC\Controllers\BaseController;
use Filip785\MVC\Validator\Validator;
use Filip785\MVC\ORM\DB;
use Filip785\MVC\Helpers\Authorize;
use Filip785\MVC\Helpers\Flash;

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
        Flash::success('Comment added. Awaiting admin approval...');

        $this->redirect('/products');
    }

    public function allow($comment_id)
    {
        if (!Authorize::verify()) {
            $this->redirect('/dashboard/login');
        }

        $comment = DB::table('comments')->get($comment_id);

        if (!$comment) {
            Flash::error('That comment does not exist.');
            $this->redirect('/dashboard');

            return;
        }

        DB::table('comments')->updateWhere(['id' => $comment_id], ['is_allowed' => 1]);

        $this->redirect('/dashboard');
    }

    public function disallow($comment_id)
    {
        if (!Authorize::verify()) {
            $this->redirect('/dashboard/login');
        }

        $comment = DB::table('comments')->get($comment_id);

        if (!$comment) {
            Flash::error('That comment does not exist.');
            $this->redirect('/dashboard');

            return;
        }

        DB::table('comments')->delete($comment_id);

        $this->redirect('/dashboard');
    }
}
