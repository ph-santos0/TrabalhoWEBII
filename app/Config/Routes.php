<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::home');
$routes->view("welcome-message", "welcome_message");
$routes->resource('users');
$routes->resource('teams');
$routes->get('teams/pdf/(:num)', 'PdfController::export/$1');