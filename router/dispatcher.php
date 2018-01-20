<?php

use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\Exception\HttpRouteNotFoundException as HttpRouteNotFoundException;

$collector = new RouteCollector();

require_once APP_PATH . 'app/http/routes.php';

//cache the return value from $router->getData() so you don't have to create the routes each request
$dispatcher =  new Dispatcher($collector->getData());

try {

    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    // Print out the value returned from the dispatched function

    echo $response;

} catch (HttpRouteNotFoundException $ex) {

    echo $dispatcher->dispatch("GET", "/");
}




















