<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Auth 라우트
$routes->get('/auth/register', 'AuthController::register');
$routes->post('/auth/storeRegister', 'AuthController::storeRegister');
$routes->get('/auth/login', 'AuthController::login');
$routes->post('/auth/authenticate', 'AuthController::authenticate');
$routes->get('/auth/logout', 'AuthController::logout');

// Dashboard 라우트
$routes->get('/dashboard', 'DashboardController::index');

// User 라우트
$routes->get('/user/show', 'UserController::show');