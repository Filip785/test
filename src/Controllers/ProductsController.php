<?php

namespace Filip785\MVC\Controllers;

use Filip785\MVC\Controllers\BaseController;
use Filip785\MVC\ORM\DB;
use Filip785\MVC\Models\Product;

class ProductsController extends BaseController
{
    public function index()
    {
        $this->setViewVar('title', 'Showing all products');

        $model = new Product();
        $model->create(['image' => '/img/img2.jpg', 'title' => 'citrus juice', 'description' => 'citrus juice 2 desc']);

        $allProducts = DB::table('products')->all();

        $this->render();
    }

    public function get(int $product_id)
    {
        $this->setViewVar('id', $product_id);
        $this->render();
    }
}
