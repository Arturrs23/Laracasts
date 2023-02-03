<?php

use Core\App;
use Core\Database;

// Resolve Database instance
$db = App::resolve(Database::class);

// Get notes from database for user with ID 1
$notes = $db->query('select * from notes where user_id = 1')->get();

// Render view file with heading "My Notes" and notes data
view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);
