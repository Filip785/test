<?php

namespace Filip785\MVC\Controllers;

use Filip785\MVC\Controllers\BaseController;
use Filip785\MVC\Validator\Validator;
use Filip785\MVC\ORM\DB;
use Filip785\MVC\Helpers\Authorize;

class DashboardController extends BaseController
{
    public function index()
    {
        if (!Authorize::verify()) {
            $this->redirect('/dashboard/login');
            return;
        }

        $comments = DB::table('comments')->where(['is_allowed' => 0]);

        $this->setViewVar('user', $_SESSION['user']);
        $this->setViewVar('comments', $comments);

        $this->render();
    }

    public function login()
    {
        if (Authorize::verify()) {
            $this->redirect('/dashboard');
            return;
        }

        if ($this->hasErrors()) {
            $this->setViewVar('loginErrors', $this->getErrors());
        }

        $this->render();
    }

    public function doLogin()
    {
        $validator = new Validator();

        $validator->validate($_POST, [
            'username' => 'required',
            'password' => 'required'
        ]);

        if (count($validator->getErrors()) > 0) {
            $this->setErrors($validator->getErrors());
            $this->redirect('/dashboard/login');

            return;
        }

        $user = DB::table('users')->where(['username' => $_POST['username']]);

        if (!isset($user[0])) {
            $this->setError('bad_login', 'Could not find that username/password.');
            $this->redirect('/dashboard/login');

            return;
        }

        if (!password_verify($_POST['password'], $user[0]['password'])) {
            $this->setError('bad_login', 'Could not find that username/password.');
            $this->redirect('/dashboard/login');

            return;
        }

        Authorize::login($user[0]);

        $this->redirect('/dashboard');
    }

    public function logout()
    {
        Authorize::logout();

        $this->redirect('/dashboard/login');
    }
}
