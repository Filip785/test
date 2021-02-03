<?php

namespace Filip785\MVC\Controllers;

use Filip785\MVC\Controllers\BaseController;
use Filip785\MVC\ORM\DB;
use Filip785\MVC\Models\Product;
use Filip785\MVC\Helpers\Flash;

class ProductsController extends BaseController
{
    public function index()
    {
        $allProducts = array_chunk(DB::table('products')->all(), 3);
        $allComments = DB::table('comments')->where(['is_allowed' => 1]);

        $this->setViewVar('title', 'Showing all products');
        $this->setViewVar('allProducts', $allProducts);
        $this->setViewVar('allComments', $allComments);

        if ($this->hasErrors()) {
            $this->setViewVar('commentErrors', $this->getErrors());

            if ($this->hasValues()) {
                $this->setViewVar('commentValues', $this->getValues());
            }
        }

        if (Flash::has()) {
            $this->setViewVar('successFlash', Flash::get());
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
