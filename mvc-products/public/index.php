<?php

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../core/Router.php';

$router = new Router();

$router->get('/', ['ProductController', 'index']);
$router->get('/products', ['ProductController', 'index']);
$router->get('/products/create', ['ProductController', 'create']);
$router->post('/products/create', ['ProductController', 'store']);

$router->get('/products/edit', ['ProductController', 'edit']);
$router->post('/products/edit', ['ProductController', 'update']);

$router->post('/products/delete', ['ProductController', 'delete']);

$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);