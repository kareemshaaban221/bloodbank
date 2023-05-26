<?php

function asset(string $filename) {
    return 'assets/' . $filename;
}

function dd(mixed $var) {
    var_dump($var);
    die();
}

function auth() {
    return $_SESSION['user'];
}
