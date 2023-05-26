<?php

namespace App\Core;

class Request {
    public static function uri() {
        $uris = explode('/', trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'
        ));

        array_shift($uris);

        return implode('/', $uris);
    }

    public static function method() {
        return $_SERVER['REQUEST_METHOD'];
    }
}
