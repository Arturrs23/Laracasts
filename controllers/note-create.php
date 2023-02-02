<?php 


// Require the config file
$config = require('config.php');

// Create a new instance of the Database class
$db = new Database($config['database']);

$heading = 'Create a new note';

// inserting the post in db
if ($_SERVER['REQUEST_METHOD'] === 'POST'){

//IF server side string length VALIDATION for form
$errors = [];
if(strlen($_POST['body']) === 0){
$errors['body'] = 'Please fill in the textarea';
}
// IF the text is longer 1000 chars, error
if(strlen($_POST['body']) > 1000){
    $errors['body'] = 'Cannot be more than 1000 characters';
    }
    

if (empty($errors)) {
    $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
        'body' => $_POST['body'],
        'user_id' => 1
    ]);
}
}


// this controller requires the new view notes-create
require 'views/note-create.view.php';