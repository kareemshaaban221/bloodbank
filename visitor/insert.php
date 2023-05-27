<?php

use App\Core\Request;
use App\Core\Session;
use App\Models\Donor;
use App\Models\Patient;

use function PHPSTORM_META\type;

$arr = [];
if (!(Request::get('fname')) || empty(Request::get('fname'))) {
    $arr[] = 'fname';
}
if (!(Request::get('lname')) || empty(Request::get('lname'))) {
    $arr[] = 'lname';
}
if (!(Request::get('email')) || !filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
    $arr[] = 'email';
}
if (!(Request::get('blood')) || empty(Request::get('blood'))) {
    $arr[] = 'blood';
}
if (!(Request::get('address')) || empty(Request::get('address'))) {
    $arr[] = 'address';
}
// if(gettype($_POST['address']!='string')){
//     $arr[]='string';
// }
if (!(Request::get('phone')) || empty(Request::get('phone'))) {
    $arr[] = 'phone';
}
// if(gettype($_POST['phone']!='integer')){
//     $arr[]='integer';
// }
if (!(Request::get('password')) || empty(Request::get('password'))) {
    $arr[] = 'password';
}
if (!(Request::get('password_confirmation')) || empty(Request::get('password_confirmation'))) {
    $arr[] = 'password_confirmation';
}
if (Request::get('password') != Request::get('password_confirmation')) {
    $arr[] = 'password_not_equal';
}
if (!Request::get('type')) {
    $arr[] = 'type';
}
if ($arr) {
    header("location:register?arr=" . implode(",", $arr));
    exit;
}

$conect = new DbSql();
if (!$conect) {
    echo mysqli_connect_error();
}

if (Request::get('type') == 'patient') {

    $model = new Patient;
    $model->prepare($conect);
    $querry = $model->save();

    if ($querry) {
        Session::set('user_type', 'patient');
        Session::set('user', $model->patient);
        header("location:home");
        exit;
    }

} elseif (Request::get('type') == 'donor') {

    $model = new Donor;
    $model->prepare($conect);
    $querry = $model->save();

    if ($querry) {
        Session::set('user_type', 'donor');
        Session::set('user', $model->donor);
        header("location:home");
        exit;
    }

}
?>