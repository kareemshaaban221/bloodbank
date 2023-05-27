<?php

use App\Core\Auth;

// ****************** SHARED ROUTES *******************//
$router->get('/', '/index.php');
$router->get('/home', '/index.php');

if (!Auth::check()) {
    // ****************** VISITOR ROUTES *******************//
    $router->get('/login', '/login.php');
    $router->post('/login', '/login.php');
    $router->get('/register', '/register.php');
    $router->post('/register', '/insert.php');
    $router->get('/password_reset_email', '/password-reset.php');
    $router->post('/password_reset_email', '/password-reset.php');
    $router->get('/password_reset', '/password-reset-form.php');
    $router->post('/password_reset', '/password-reset-form.php');

} else if (Auth::user_type() == 'patient') {
    // ****************** PATIENT ROUTES *******************//
    $router->post('/request_store', '/insert_in_patient_request.php');
    $router->get('/profile', '/profile.php');
    $router->get('/profile_edit', '/profile-edit.php');
    $router->post('/profile_edit', '/profile-edit.php');
    
} else if (Auth::user_type() == 'donor') {
    // ****************** DONOR ROUTES *******************//
    $router->get('/my_donations', '/my-donations.php');
    $router->get('/request_store', '/insert_in_donor_request.php');
    $router->get('/profile', '/profile.php');
    $router->get('/profile_edit', '/profile-edit.php');
    $router->post('/profile_edit', '/profile-edit.php');
    
} else if(Auth::user_type() == 'admin'){
    // ****************** ADMIN ROUTES *******************//
    $router->get('/patients', '/patient.php');
    $router->get('/patient_requests', '/patient_request.php');
    $router->get('/donors', '/donor.php');
    $router->get('/donor_requests', '/index.php');
    $router->get('/profile', '/profile.php');
    $router->post('/approve', '/approve.php');
    $router->get('/cancel', '/cancel.php');

}
