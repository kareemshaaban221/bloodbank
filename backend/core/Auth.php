<?php 

namespace App\Core;

class Auth {
    public static function check() {
        return Session::has('user');
    }
    public static function user() {
        return Session::get('user');
    }

    public static function user_type() {
        return Session::has('user_type') ?
            Session::get('user_type') : null;
    }

    public static function login($user) {
        Session::set('user', $user);
        Session::set('user_type', $user->type);
        return $user;
    }
}
