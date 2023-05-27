<?php

namespace App\Core;

class Request {

    /**
     * * uri - get the uri of request
     *
     * @return string
     */
    public static function uri() {
        $uris = explode('/', trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'
        ));

        array_shift($uris);

        return implode('/', $uris);
    }

    /**
     * * method - get the method of request
     *
     * @return string
     */
    public static function method() {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    /**
     * get - get a parameter from request
     *
     * @param $key - key of request
     * @param $method - method [GET, POST]
     * @return string
     */
    public static function get($key, $method = null) {
        if ($method == 'get')
            return isset($_GET[$key]) ? $_GET[$key] : null;
        else if ($method == 'post')
            return isset($_POST[$key]) ? $_POST[$key] : null;
        else
            return isset($_REQUEST[$key]) ? $_REQUEST[$key] : null;
    }

    public static function set($key, $value, $method = null) {
        if ($method == 'get')
            $_GET[$key] = $value;
        else if ($method == 'post')
            $_POST[$key] = $value;
        else
            $_REQUEST[$key] = $value;
    }
}
