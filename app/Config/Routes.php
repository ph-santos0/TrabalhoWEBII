<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('teams/pdf/(:num)', 'PdfController::export/$1');
$routes->get('/', 'Home::index');
$routes->get('login', 'Home::login');
$routes->get('teams', 'Home::teams');
$routes->get('register', 'Home::register');
