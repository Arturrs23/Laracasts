<?php

use Core\Response;

// Function to print the value and stop the script execution
function dd($value)
{
    // Using <pre> tags to format the output
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    // Die function stops the execution of the script
    die();
}

// Function to check if the current URL is equal to the passed value
function urlIs($value)
{
    // Returns a boolean value indicating if the current request URL is equal to the passed value
    return $_SERVER['REQUEST_URI'] === $value;
}

// Function to show error pages with a specific HTTP status code
function abort($code = 404)
{
    // Setting the HTTP response code
    http_response_code($code);

    // Including the error page with the specified code
    require base_path("views/{$code}.php");

    // Stopping the script execution
    die();
}

// Function to check if a condition is met, otherwise it aborts with a specific status code
function authorize($condition, $status = Response::FORBIDDEN)
{
    // If the condition is not met, the function aborts with the specified status code
    if (! $condition) {
        abort($status);
    }

    // If the condition is met, it returns true
    return true;
}

// Function to return the absolute path with a passed relative path
function base_path($path)
{
    // Return the absolute path with the passed relative path
    return BASE_PATH . $path;
}

// Function to include and render a view file with passed attributes
function view($path, $attributes = [])
{
    // Extracting the attributes and making them variables within the function
    extract($attributes);

    // Including the view file
    require base_path('views/' . $path);
}