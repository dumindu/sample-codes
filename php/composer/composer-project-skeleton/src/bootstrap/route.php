<?php
use Bramus\Router\Router;
use \App\Controllers\HelloWorld;

$router = new Router();
$router->get('/', function() {
    echo (new HelloWorld())->greet();
});
$router->run();
