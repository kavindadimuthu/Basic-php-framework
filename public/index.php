<?php

use app\core\Application;
use app\core\Helpers\SessionHelper;
use Dotenv\Dotenv;

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../vendor/autoload.php';


$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Start the session
SessionHelper::startSession();

// Create the application instance
$app = new Application();

// Define routes
$app->router->get('/', 'GuestController@home');
$app->router->get('/about', 'GuestController@about');
$app->router->get('/user/{id}', 'GuestController@user');
$app->router->post('/contact', 'GuestController@contact');

// Run the application
$app->run();
