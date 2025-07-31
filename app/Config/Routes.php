<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('v1', function ($routes) {
     $routes->resource('posts', ['controller' => 'PostController', 'except' => ['new', 'edit']]);
});