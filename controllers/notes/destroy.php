<?php

use Core\App;
use Core\Database;

// Resolve Database instance
$db = App::resolve(Database::class);

// Set current user ID
$currentUserId = 1;

// Get note data from database
$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

// Check if current user is authorized to delete note
authorize($note['user_id'] === $currentUserId);

// Delete note from database
$db->query('delete from notes where id = :id', [
    'id' => $_POST['id']
]);

// Redirect to /notes
header('location: /notes');
exit();
