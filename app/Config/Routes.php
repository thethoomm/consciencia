<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'PagesController::home', ['as' => 'home']);
$routes->get('/noticias/topicos/(:any)', 'PagesController::specific/$1', ['as' => 'pages']);
//$routes->get('/noticias/artigo/(:any)', 'PagesController::article/$1', ['as' => 'article']);

// Auth
$routes->get('/login', 'AuthController::login', ['as' => 'login']);
$routes->post('/login', 'AuthController::postLogin', ['as' => 'post.login']);

$routes->get('/signup', 'AuthController::signUp', ['as' => 'signup']);
$routes->post('/signup', 'AuthController::postSignUp', ['as' => 'post.signup']);

$routes->get('/logout', 'AuthController::logout', ['as' => 'logout']);


// NewsAPI
$routes->get('/api', 'NewsAPIController::index', ['as' => 'api']);

// WeatherAPI
$routes->get('/weather', 'WeatherAPIController::getCityWeather', ['as' => 'weather']);

// EmailSender
$routes->get('/email', 'EmailSenderController::sendEmail', ['as' => 'email']);
