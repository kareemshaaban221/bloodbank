<?php

session_start();

// * routes
require_once 'backend/core/Router.php';
require_once 'backend/core/Request.php';
require_once 'backend/helpers/functions.php';

use App\Core\Router;
use App\Core\Request;

$router = new Router;

require_once 'routes.php';

if (!isset($_SESSION['user_type']))
    $_SESSION['user_type'] = 'visitor';

if ($_SESSION['user_type'] == 'visitor') {
    // dd('visitor' . $router->handler('/' . Request::uri(), Request::method()));
    $_SESSION['content'] = 'visitor' . $router->handler('/' . Request::uri(), Request::method());
}

include 'layouts/app.php';