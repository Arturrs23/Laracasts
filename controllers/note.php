<?php

// Require the config file
$config = require('config.php');

// Create a new instance of the Database class
$db = new Database($config['database']);

// Set the default page heading
$heading = 'Note';

// Set the ID of the current user
$currentUserId = 1;

// Get the note with the ID from the GET parameters
$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

// Authorize that the current user is the owner of the note
authorize($note['user_id'] === $currentUserId);

// Require the note view file
require "views/note.view.php";
