<?php

use App\Core\Auth;

$router->get('/', '/index.php');
$router->get('/home', '/index.php');

if (!Auth::check()) {

    $router->get('/login', '/login.php');
    $router->post('/login', '/login.php');
    $router->get('/register', '/register.php');
    $router->post('/register', '/insert.php');

} else if (Auth::user_type() == 'patient') {

    $router->post('/request_store', '/insert_in_patient_request.php');

} else if (Auth::user_type() == 'donor') {

    $router->get('/my_donations', '/my-donations.php');

}
