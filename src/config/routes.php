<?php

use FastRoute\RouteCollector;

return FastRoute\simpleDispatcher(function (RouteCollector $r) {
    $r->addRoute('GET', '/', 'HomeController@index');

    $r->addRoute('GET', '/dashboard', 'DashboardController@index');
    $r->addRoute('GET', '/dashboard/login', 'DashboardController@login');
    $r->addRoute('GET', '/dashboard/logout', 'DashboardController@logout');
    $r->addRoute('POST', '/dashboard/doLogin', 'DashboardController@doLogin');

    $r->addRoute('GET', '/products', 'ProductsController@index');
    $r->addRoute('GET', '/products/{product_id:\d+}', 'ProductsController@get');

    $r->addRoute('POST', '/comments/create', 'CommentsController@create');
    $r->addRoute('POST', '/comments/allow/{comment_id:\d+}', 'CommentsController@allow');
    $r->addRoute('POST', '/comments/disallow/{comment_id:\d+}', 'CommentsController@disallow');
});
