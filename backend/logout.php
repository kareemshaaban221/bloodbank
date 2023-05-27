<?php

use App\Core\Session;

session_start();
Session::clear();
session_destroy();
header("location:home");
exit;