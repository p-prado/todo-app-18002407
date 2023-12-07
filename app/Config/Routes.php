<?php

use App\Controllers\TaskController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', [TaskController::class, 'home']);
$routes->get('/tasks', [TaskController::class, 'index']);
$routes->get('/tasks/create', [TaskController::class, 'create']);
$routes->get('/tasks/(:segment)', [TaskController::class, 'show']);
$routes->post('/tasks', [TaskController::class, 'store']);
$routes->post('/tasks/(:segment)/complete', [TaskController::class, 'complete']);
$routes->delete('/tasks/(:segment)', [TaskController::class, 'destroy']);