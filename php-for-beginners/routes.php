<?php
// Pages
$router->get('','PagesController@home');
$router->get('about','PagesController@about');
$router->get('about-culture','PagesController@aboutCulture');
$router->get('contact','PagesController@contact');
$router->post('names','PagesController@addName');
// Users
$router->get('users','UsersController@index');
$router->post('users','UsersController@store');
// Tasks
$router->get('tasks','TasksController@index');