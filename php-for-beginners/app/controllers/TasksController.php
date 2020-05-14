<?php
namespace App\Controllers;
use Core\App;
class TasksController
{
    public function index()
    {
        require 'Task.php';
        $tasks = App::get('database')->selectAll('todos', 'Task');
        return view('tasks', compact('tasks'));
    }
}