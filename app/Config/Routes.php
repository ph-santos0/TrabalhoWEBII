<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Rotas Públicas
$routes->get('/', 'Home::index');

// Rotas de Autenticação
$routes->get('login', 'UserController::login');
$routes->post('login/authenticate', 'UserController::login');
$routes->match(['get', 'post'], 'register', 'UserController::register');
$routes->get('logout', 'UserController::logout');
$routes->match(['get', 'post'], 'forgot-password', 'UserController::forgotPassword');
$routes->match(['get', 'post'], 'reset-senha/(:any)', 'UserController::resetPassword/$1');

// Área Restrita
$routes->group('', ['filter' => 'auth'], function ($routes) {
    // Rota principal apontando para o TeamController
    $routes->get('dashboard', 'TeamController::index');
    $routes->get('perfil', 'UserController::perfil');
    $routes->get('meu-time', 'TeamController::meuTime');
    
    // Rota de PDF
    $routes->get('teams/pdf/(:num)', 'PdfController::export/$1');
});