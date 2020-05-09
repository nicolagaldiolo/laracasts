<?php
$app = [];
$app['config'] = require 'config.php';
require 'core/Router.php';
require 'core/Request.php';
require 'core/database/Connection.php';
require 'core/database/QueryBuider.php';

$app['database'] = new QueryBuider(
    Connection::make($app['config']['database'])
);