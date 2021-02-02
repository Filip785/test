<?php
namespace Filip785\MVC\Controllers;

use Filip785\MVC\Controllers\BaseController;

class ProductsController extends BaseController {
    public function index() {
        $this->setViewVar('title', 'Showing all products');

        $this->render();
    }

    public function get(int $product_id) {
        $this->setViewVar('id', $product_id);

        $this->render();
    }
}