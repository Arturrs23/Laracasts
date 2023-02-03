<?php

use Core\App;
use Core\Container;
use Core\Database;

// Instantiate a new Container object
$container = new Container();

// Bind the Core\Database class to a closure that returns a new Database instance with the database configuration
$container->bind('Core\Database', function () {
    // Load the database configuration from the config.php file
    $config = require base_path('config.php');

    // Return a new Database instance with the database configuration
    return new Database($config['database']);
});

// Set the container in the App class
App::setContainer($container);