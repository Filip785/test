<?php

namespace Filip785\MVC\Controllers;

use Filip785\MVC\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        // redirect to products for now
        $this->redirect('/products');
    }
}
