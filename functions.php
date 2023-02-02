<?php

// Function to print and stop the script execution
function dd($value)
{
    // Print the value in preformatted text
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    // Stop the script execution
    die();
}

// Function to check if the URL matches the given value
function urlIs($value) {
    // Return the comparison result between the current request URL and the given value
    return $_SERVER['REQUEST_URI'] === $value;
}

// Function to check if the given condition is true, otherwise abort with the specified status code
function authorize($condition, $status = Response::FORBIDDEN) {
    // If the condition is false
    if (! $condition) {
        // Abort with the specified status code
        abort($status);
    }
}
