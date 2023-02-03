<?php

namespace Core;

class Router
{
    //Array to store all the defined routes
    //  protected array will be available only in this class
    protected $routes = [];
//Adds a route to the routes array
    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }


    // route methods
    public function get($uri, $controller)
    {
        $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        $this->add('POST', $uri, $controller);
    }
// deleting
    public function delete($uri, $controller)
    {
        $this->add('DELETE', $uri, $controller);
    }
// updating
    public function patch($uri, $controller)
    {
        $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        $this->add('PUT', $uri, $controller);
    }

    public function route($uri, $method)
    {
        //Iterate over all the routes
        foreach ($this->routes as $route) {
            //Check if the URI and method match the current route
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                //If a match is found, return the controller
                return require base_path($route['controller']);
            }
        }

        $this->abort();
    }

    protected function abort($code = 404)
    {
        http_response_code($code);

        require base_path("views/{$code}.php");

        die();
    }
}