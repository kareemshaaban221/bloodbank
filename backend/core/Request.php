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
        return $_SERVER['REQUEST_METHOD'];
    }
}
