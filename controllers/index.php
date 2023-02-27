<?php


$_SESSION['name'] = 'Arturs';

view("index.view.php", [
    'heading' => 'Home',
]);