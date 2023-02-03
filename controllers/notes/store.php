<?php

use Core\App;
use Core\Validator;
use Core\Database;

// Resolve Database instance
$db = App::resolve(Database::class);

// Initialize errors array
$errors = [];

// Validate note body
if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

// If there are errors, render create view with error messages
if (! empty($errors)) {
    return view("notes/create.view.php", [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}

// Insert note into database for user with ID 1
$db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
    'body' => $_POST['body'],
    'user_id' => 1
]);

// Redirect to /notes
header('location: /notes');
die();

