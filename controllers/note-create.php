<?php 
  // this controller requires the new view notes-create
  require 'views/note-create.view.php';

// Require the config file
$config = require('config.php');

// Create a new instance of the Database class
$db = new Database($config['database']);

$heading = 'Create a new note';

    // inserting the post in db
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
   $db->query('INSERT INTO notes(body, user_id) VALUES (:body, :user_id)', [

    'body' => $_POST['body'],
    'user_id' => 1



   ]);

    }


