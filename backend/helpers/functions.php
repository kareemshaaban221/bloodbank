<?php

use App\Core\Auth;
use App\Core\Request;
use App\Core\Session;

function asset(string $filename) {
    return 'assets/' . $filename;
}

function dd(mixed $var) {
    var_dump($var);
    die();
}

function init_session_user_type() {
    if (!Session::has('user_type'))
        Session::set('user_type', 'visitor');
}

function set_page_content($handler) {
    Session::set(
        'content',
        Session::get('user_type') . $handler
    );
}

function isLogout() {
    if (Request::uri() == 'logout')
        require 'backend/logout.php';
    else
        return false;
}

function auth() {
    return Auth::user();
}
