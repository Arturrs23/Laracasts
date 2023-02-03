<?php

// Define a constant for the base path of the application
const BASE_PATH = __DIR__ . '/../';

// Require the application's functions file
require BASE_PATH . 'Core/functions.php';

// Register an autoloader to automatically load classes as needed
spl_autoload_register(function ($class) {
    // Replace backslashes with directory separators
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    // Require the file for the class
    require base_path("{$class}.php");
});

// Require the bootstrap file
require base_path('bootstrap.php');

// Instantiate the router
$router = new \Core\Router();

// Load the application's routes
$routes = require base_path('routes.php');

// Get the current URI and request method
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

// Route the request
$router->route($uri, $method);