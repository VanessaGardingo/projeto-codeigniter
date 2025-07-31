<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
/*
 * --------------------------------------------------------------------
 * API Routes
 * --------------------------------------------------------------------
 */
// O 'group' cria o versionamento /v1/ para todas as rotas dentro dele
$routes->group('v1', function ($routes) {
    // O 'resource' cria todas as rotas CRUD (GET, POST, PUT, DELETE) automaticamente
    $routes->resource('posts', ['controller' => 'PostController', 'except' => ['new', 'edit']]);
});