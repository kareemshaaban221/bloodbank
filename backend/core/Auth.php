<?php 

namespace App\Core;

class Auth {
    public static function check() {
        return Session::has('user');
    }
    public static function user() {
        return Session::get('user');
    }
}
