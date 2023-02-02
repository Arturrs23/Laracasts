<?php

// Require the config file
$config = require('config.php');

// Create a new instance of the Database class
$db = new Database($config['database']);

// Set the default page heading
$heading = 'My Notes';

// Get the notes from the database for the user with ID 1
$notes = $db->query('select * from notes where user_id = 1')->get();

// Require the notes view file
require "views/notes.view.php";
