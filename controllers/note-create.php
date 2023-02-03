<?php 
// form validator
require 'validator.php';

// Require the config file
$config = require('config.php');

// Create a new instance of the Database class
$db = new Database($config['database']);

$heading = 'Create a new note';

// inserting the post in db
if ($_SERVER['REQUEST_METHOD'] === 'POST'){

//IF server side string length VALIDATION for form
$errors = [];

$validator = new Validator();
// min chars are 1 and max 1000
if(! Validator::string($_POST['body'], 1, 1000)){
$errors['body'] = 'Min 1 character and max 1000';
}
// IF the text is longer 1000 chars, error
// if(strlen($_POST['body']) > 1000){
//     $errors['body'] = 'Cannot be more than 1000 characters';
//     }
    

if (empty($errors)) {
    $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
        'body' => $_POST['body'],
        'user_id' => 1
    ]);
}
}


// this controller requires the new view notes-create
require 'views/note-create.view.php';