<?php

namespace App\Core;

class Router {
    public $routes = [];

    /**
     * * get - set a GET request route
     * * that pointer to an action php file
     *
     * @param string $route - desired route
     * @param string $action - php action file
     * @return void
     */
    public function get(string $route, string $action) {
        $this->routes['get'][$route] = $action;
    }

    /**
     * * post - set a POST request route
     * * that pointer to an action php file
     *
     * @param string $route - desired route
     * @param string $action - php action file
     * @return void
     */
    public function post(string $route, string $action) {
        $this->routes['post'][$route] = $action;
    }

    /**
     * * handler - get the action that associated with
     * * the route given the method of this route
     *
     * @param string $route - desired route
     * @param string $method - desired route method
     * @return null|string
     */
    public function handler(string $route, string $method) {
        if ($method == 'get') {
            if (array_key_exists($route, $this->routes['get']))
                return $this->routes['get'][$route];
            else
                throw new \Exception('Route not found');
        } else if ($method == 'post') {
            if (array_key_exists($route, $this->routes['post']))
                return $this->routes['post'][$route];
            else
                throw new \Exception('Route not found');
        }
    }

    public function all() {
        return $this->routes;
    }
}
