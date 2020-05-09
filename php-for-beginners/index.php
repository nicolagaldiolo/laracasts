<?php
// Go to /Users/chloe/Projects/Valet/laracasts/php-for-beginners with terminal and
// run php -S localhost:8000 in the terminal for create a realtime Development Server Listening on http://localhost:8888

$database = require 'core/bootstrap.php';
require Router::load('routes.php')
    ->direct(Request::uri());