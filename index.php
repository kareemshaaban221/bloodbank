<?php

session_start();

// * routes
require_once 'backend/helpers/functions.php';
require_once 'backend/core/Router.php';
require_once 'backend/core/Request.php';
require_once 'backend/core/Session.php';
require_once 'backend/core/Auth.php';
require_once 'backend/models/Model.php';
require_once 'backend/models/Patient.php';
require_once 'backend/models/Donor.php';
require_once 'backend/models/Admin.php';

use App\Core\Router;
use App\Core\Request;

$router = new Router;

require_once 'routes.php';

init_session_user_type();

if (!isLogout())
    set_page_content($router->handler('/' . Request::uri(), Request::method()));

include 'layouts/app.php';