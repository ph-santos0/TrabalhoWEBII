<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ====================================================================
// Rotas Públicas
// ====================================================================
$routes->get('/', 'Home::index');

// ====================================================================
// Rotas de Autenticação e Usuários
// ====================================================================

// Login
$routes->get('login', 'UserController::login');
$routes->post('login/authenticate', 'UserController::login');

// Registro
$routes->match(['get', 'post'], 'register', 'UserController::register');

// Logout
$routes->get('logout', 'UserController::logout');

// Recuperação de Senha (Req 11)
// O 'match' aqui garante que tanto o acesso à página (GET) 
// quanto o envio do formulário (POST) sejam atendidos pela mesma rota
$routes->match(['get', 'post'], 'forgot-password', 'UserController::forgotPassword');

// Reset de Senha após receber o e-mail
$routes->match(['get', 'post'], 'reset-senha/(:any)', 'UserController::resetPassword/$1');

// ====================================================================
// Rotas da Área Restrita (Protegidas pelo filtro 'auth')
// ====================================================================
$routes->group('', ['filter' => 'auth'], function ($routes) {

    $routes->get('dashboard', 'Home::dashboard');

    // Rotas de Times
    $routes->get('teams', 'Home::teams');
    $routes->get('teams/pdf/(:num)', 'PdfController::export/$1');
});
