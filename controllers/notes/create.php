<?php

// This line calls the view function and passes two arguments to it:
// The first argument is the path to the view file that we want to render. In this case, it is "notes/create.view.php".
// The second argument is an associative array containing key-value pairs that we want to make available to the view. 
// This array contains two keys: "heading" and "errors".
// The value of "heading" is "Create Note", and the value of "errors" is an empty array.
view("notes/create.view.php", [
    'heading' => 'Create Note',
    'errors' => []
]);