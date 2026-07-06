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

    // Dashboard
    $routes->get('dashboard', 'TeamController::index');

    $routes->get('perfil', 'UserController::perfil');

    $routes->get('meu-time', 'TeamController::meuTime');

    /*
    |--------------------------------------------------------------------------
    | CRUD DAS EQUIPES
    |--------------------------------------------------------------------------
    */

    $routes->get('teams/(:num)', 'TeamController::buscar/$1');

    $routes->post('teams', 'TeamController::salvar');

    $routes->post('teams/editar/(:num)', 'TeamController::atualizar/$1');

    $routes->get('teams/excluir/(:num)', 'TeamController::excluir/$1');


    /*
    |--------------------------------------------------------------------------
    | PDF
    |--------------------------------------------------------------------------
    */

    $routes->get(
    'team/pdf/(:num)',
    'TeamController::exportarPDF/$1',
    ['filter' => 'auth']
);
/*
    |--------------------------------------------------------------------------
    | Rotas de Edição de Equipes
    |--------------------------------------------------------------------------
    */
$routes->get('teams/edit/(:num)', 'TeamController::edit/$1');
$routes->post('teams/update/(:num)', 'TeamController::update/$1');
$routes->get('meu-time', 'TeamController::meuTime');

});