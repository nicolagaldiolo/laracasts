<?php
// Go to /Users/chloe/Projects/Valet/laracasts/php-for-beginners with terminal and
// run php -S localhost:8000 in the terminal for create a realtime Development Server Listening on http://localhost:8888
// Anzichè caricare le classi a mano lo faccio tramite l'autoloader che pesca tutte le classe definite nel file composer.json
require 'vendor/autoload.php';
require 'core/bootstrap.php';
use Core\Router;
use Core\Request;
Router::load('routes.php')
    ->direct(Request::uri(), Request::method());