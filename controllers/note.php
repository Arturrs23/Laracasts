<?php $config=require('config.php');

// connecting to the DB key
$db=new Database($config['database']);

$heading='Note';
$currentUserId=1;


//Single note
// Fetching dynamically note from DB & authorazing that matches in the query string
$note=$db->query('select * from notes where id = :id',[ 
    // returning PDO statemant obj from Database.php
    'id'=> $_GET['id']])->findOrFail();
// if created by current user if not then forbidden access
if ($note['user_id'] !=$currentUserId) {
    // require response.php class response
    abort();
}

require "views/note.view.php";

