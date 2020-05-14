<?php
namespace Core;
class Router
{
    public $routes = [
        'GET' => [],
        'POST' => []
    ];
    public static function load($file)
    {
        $router = new static;
        require $file;
        return $router;
    }
    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }
    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }
    //public function define($routes)
    //{
    //    $this->routes = $routes;
    //}
    public function direct($uri, $requestType)
    {
        if(array_key_exists($uri, $this->routes[$requestType])){
            // make the spread operator like in JS
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        }
        throw new Exception('No route defined fro this URI.');
    }
    protected function callAction($controller, $method)
    {
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;

        if(!method_exists($controller, $method)){
            throw new Exception(
                "{$controller} does not responde to the {$method} method"
            );
        }
        return $controller->$method();
    }
}