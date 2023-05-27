<?php 

namespace App\Core;

class Session {
    public static function has($key) {
        return isset($_SESSION[$key]);
    }

    public static function get($key) {
        if (self::has($key))
            return $_SESSION[$key];
        else
            return null;
    }

    public static function set($key, $value) {
        $_SESSION[$key] = $value;
        return true;
    }

    public static function all() {
        return $_SESSION;
    }
}
