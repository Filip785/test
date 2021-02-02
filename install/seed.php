<?php

use Filip785\MVC\Loaders\DatabaseLoader;
use Filip785\MVC\ORM\DB;

$dir = dirname(__DIR__);

require $dir . '/vendor/autoload.php';

DatabaseLoader::loadDB($dir . '/src/config/database.php');
DB::table('products')->create(['image' => '/assets/images/citrus1.jpg', 'title' => 'Citrus Juice 1', 'description' => 'Very nice citrus juice 1!']);
DB::table('products')->create(['image' => '/assets/images/citrus2.jpeg', 'title' => 'Citrus Juice 2', 'description' => 'Very nice citrus juice2 !']);
DB::table('products')->create(['image' => '/assets/images/citrus3.jpg', 'title' => 'Citrus Juice 3', 'description' => 'Very nice citrus juice! 3']);
DB::table('products')->create(['image' => '/assets/images/citrus4.jpg', 'title' => 'Citrus Juice 4', 'description' => 'Very nice citrus juice 4!']);
DB::table('products')->create(['image' => '/assets/images/citrus5.jpg', 'title' => 'Citrus Juice 5', 'description' => 'Very nice citrus juice 5!']);
DB::table('products')->create(['image' => '/assets/images/orange1.jpg', 'title' => 'Orange Juice 1', 'description' => 'Very nice orange juice 1!']);
DB::table('products')->create(['image' => '/assets/images/orange2.jpg', 'title' => 'Orange Juice 2', 'description' => 'Very nice orange juice 2!']);
DB::table('products')->create(['image' => '/assets/images/orange3.jpg', 'title' => 'Orange Juice 3', 'description' => 'Very nice orange juice 3!']);
DB::table('products')->create(['image' => '/assets/images/orange4.jpg', 'title' => 'Orange Juice 4', 'description' => 'Very nice orange juice 4!']);
