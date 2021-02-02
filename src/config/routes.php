<?php

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;

$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {
    $r->addRoute('GET', '/', 'HomeController@index');

    $r->addRoute('POST', '/comments/create', 'CommentsController@create');

    // list all products
    $r->addRoute('GET', '/products', 'ProductsController@index');
    // get single product
    $r->addRoute('GET', '/products/{product_id:\d+}', 'ProductsController@get');
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}

$uri = rawurldecode($uri);
$controllersPath = dirname(__DIR__) . '../Controllers/';
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        // TODO: HANDLE NOT FOUND
        echo 'not found';

        break;
    case Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method not allowed
        // TODO: HANDLE METHOD NOT ALLOWED
        echo 'method not allowed';


        break;
    case Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];

        $handlerParams = explode('@', $handler);

        if (!isset($handlerParams[0]) || !isset($handlerParams[1])) {
            dd('Please enter your action pattern in the following format: SomeController@index.');
        }

        $className = $handlerParams[0];
        $fullNamespaceName = "Filip785\\MVC\\Controllers\\" . $className;

        if (!class_exists($fullNamespaceName)) {
            dd('Your controller class does not exist. Please provide it in src/Controllers/ and use the following namespace to define it in: Filip785\\MVC\\Controllers.');
        }

        $actionMethod = $handlerParams[1];
        if (!method_exists($fullNamespaceName, $actionMethod)) {
            dd("Action '$actionMethod' does not exist in $fullNamespaceName. Please create it.");
        }

        $class = new $fullNamespaceName($className, $actionMethod);
        $class->$actionMethod(...$vars);

        break;
}
