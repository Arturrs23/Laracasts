<?php
$config = require('config.php');

// connecting to the DB key
$db = new Database($config['database']);

$heading = 'Notes';
// Fetching all notes whith the id 1
$notes = $db->query('select * from notes where user_id = 1')->find();


require "views/notes.view.php";