<?php

namespace App\Core;

class Router {
    public $routes = [];

    public function get(string $route, string $path) {
        $this->routes['get'][$route] = $path;
    }

    public function post(string $route, string $path) {
        $this->routes['post'][$route] = $path;
    }

    public function handler(string $route, string $method) {
        if (strtolower($method) == 'get') {
            if (array_key_exists($route, $this->routes['get']))
                return $this->routes['get'][$route];
            else
                throw new \Exception('Route not found');
        } else if (strtolower($method) == 'post') {
            if (array_key_exists($route, $this->routes['post']))
                return $this->routes['post'][$route];
            else
                throw new \Exception('Route not found');
        }
    }
}
