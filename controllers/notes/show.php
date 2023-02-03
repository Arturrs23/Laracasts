<?php

use Core\App;
use Core\Database;

// Resolve Database instance
$db = App::resolve(Database::class);

// Set current user ID
$currentUserId = 1;

// Get note data from database
$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

// Check if current user is authorized to view note
authorize($note['user_id'] === $currentUserId);

// Render view file with heading "Note" and note data
view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);
