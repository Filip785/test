<?php

namespace Filip785\MVC\Controllers;

use Filip785\MVC\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $this->redirect('/products');
    }
}
