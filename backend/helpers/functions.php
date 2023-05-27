<?php

use App\Core\Request;

function asset(string $filename) {
    return 'assets/' . $filename;
}

function dd(mixed $var) {
    var_dump($var);
    die();
}

function init_session_user_type() {
    if (!isset($_SESSION['user_type']))
        $_SESSION['user_type'] = 'visitor';
}

function set_page_content($handler) {
    $_SESSION['content'] = $_SESSION['user_type'] . $handler;
}

function isLogout() {
    if (Request::uri() == 'logout')
        require 'backend/logout.php';
    else
        return false;
}

function auth() {
    return $_SESSION['user'];
}
