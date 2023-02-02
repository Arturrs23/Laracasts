<?php

// Require the routes file
require('routes.php');

// Function to route the request to the corresponding controller
function routeToController($uri, $routes) {
    // If the route exists in the routes array
    if (array_key_exists($uri, $routes)) {
        // Require the corresponding controller
        require $routes[$uri];
    } else {
        // Abort with a default 404 error
        abort();
    }
}

// Function to handle errors and return the corresponding view
function abort($code = 404) {
    // Set the HTTP response code
    http_response_code($code);

    // Require the view with the error code
    require "views/{$code}.php";

    // Stop the script execution
    die();
}

// Parse the URL and get the path
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// Route the request to the corresponding controller
routeToController($uri, $routes);
