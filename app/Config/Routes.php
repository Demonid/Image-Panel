<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
#$routes->get('/', 'Home::index');
$routes->get('/', 'AuthController::index'); // Página de inicio (login)
$routes->post('/auth/login', 'AuthController::login');
$routes->get('/auth/register', 'AuthController::register');
$routes->post('/auth/registerUser', 'AuthController::registerUser');
$routes->get('/auth/logout', 'AuthController::logout'); // Cerrar sesión

$routes->get('/dashboard', 'DashboardController::index'); // Dashboard después de iniciar sesión
$routes->post('/dashboard/uploadImage', 'DashboardController::uploadImage');
$routes->get('/dashboard/deleteImage/(:num)', 'DashboardController::deleteImage/$1');
$routes->post('/dashboard/downloadUsers', 'PDFController::downloadUsers');
