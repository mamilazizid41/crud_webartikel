<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'ArticleController::publicIndex');
$routes->get('/dashboard', 'ArticleController::index');
$routes->get('articles/create', 'ArticleController::create');
$routes->post('articles/store', 'ArticleController::store');
$routes->get('articles/edit/(:num)', 'ArticleController::edit/$1');
$routes->post('articles/update/(:num)', 'ArticleController::update/$1');
$routes->get('articles/delete/(:num)', 'ArticleController::delete/$1');
$routes->get('articles/read/(:num)', 'ArticleController::read/$1');


$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::attemptLogin');
$routes->get('logout', 'AuthController::logout');

// REST API routes
$routes->group('api', function($routes) {
    $routes->resource('articles', ['controller' => 'Api\\ArticleApi']);
});

$routes->group('api', function($routes) {
    $routes->get('articles', 'Api\ArticleApi::index');
    $routes->get('articles/(:num)', 'Api\ArticleApi::show/$1');
    $routes->post('articles', 'Api\ArticleApi::create');
    $routes->put('articles/(:num)', 'Api\ArticleApi::update/$1');
    $routes->delete('articles/(:num)', 'Api\ArticleApi::delete/$1');
});

// === Auth Routes (app/Config/Routes.php) ===
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::attemptLogin');
$routes->get('logout', 'AuthController::logout');
$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::attemptRegister');

$routes->post('feedback/store/(:num)', 'Feedback::store/$1');
$routes->get('feedback', 'Feedback::index');
$routes->delete('articles/delete/(:num)', 'ArticleController::delete/$1');
$routes->put('articles/update/(:num)', 'ArticleController::update/$1');
