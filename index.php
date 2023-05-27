<?php

session_start();

// * routes
require_once 'backend/DB.php';
require_once 'backend/helpers/functions.php';
require_once 'backend/core/Router.php';
require_once 'backend/core/Request.php';
require_once 'backend/core/Session.php';
require_once 'backend/core/Auth.php';
require_once 'backend/models/Model.php';
require_once 'backend/models/Patient.php';
require_once 'backend/models/Donor.php';
require_once 'backend/models/Admin.php';
require_once 'backend/models/PatientRequest.php';

use App\Core\Auth;
use App\Core\Router;
use App\Core\Request;
use App\Core\Session;

$router = new Router;

require_once 'routes.php';

// require_once 'backend/logout.php';

init_session_user_type();

// dd('/' . Request::uri());
if (!isLogout())
    set_page_content($router->handler('/' . Request::uri(), Request::method()));

include 'layouts/app.php';