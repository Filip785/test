<?php

namespace Filip785\MVC\Controllers;

use Filip785\MVC\Controllers\BaseController;
use Filip785\MVC\ORM\DB;
use Filip785\MVC\Models\Product;

class ProductsController extends BaseController
{
    public function index()
    {
        $allProducts = array_chunk(DB::table('products')->all(), 3);

        $this->setViewVar('title', 'Showing all products');
        $this->setViewVar('allProducts', $allProducts);

        if ($this->hasErrors()) {
            $this->setViewVar('commentErrors', $this->getErrors());
        }

        $this->render();
    }

    public function get(int $product_id)
    {
        $product = DB::table('products')->get($product_id);

        $this->setViewVar('product', $product);

        $this->render();
    }
}
