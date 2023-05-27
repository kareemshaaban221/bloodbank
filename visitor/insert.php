<?php

use App\Core\Session;
use App\Models\Donor;
use App\Models\Patient;

use function PHPSTORM_META\type;

require('backend/DB.php');
$arr = [];
if (!(isset($_POST['fname'])) || empty($_POST['fname'])) {
    $arr[] = 'fname';
}
if (!(isset($_POST['lname'])) || empty($_POST['lname'])) {
    $arr[] = 'lname';
}
if (!(isset($_POST['email'])) || !filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
    $arr[] = 'email';
}
if (!(isset($_POST['blood'])) || empty($_POST['blood'])) {
    $arr[] = 'blood';
}
if (!(isset($_POST['address'])) || empty($_POST['address'])) {
    $arr[] = 'address';
}
// if(gettype($_POST['address']!='string')){
//     $arr[]='string';
// }
if (!(isset($_POST['phone'])) || empty($_POST['phone'])) {
    $arr[] = 'phone';
}
// if(gettype($_POST['phone']!='integer')){
//     $arr[]='integer';
// }
if (!(isset($_POST['password'])) || empty($_POST['password'])) {
    $arr[] = 'password';
}
if (!(isset($_POST['password_confirmation'])) || empty($_POST['password_confirmation'])) {
    $arr[] = 'password_confirmation';
}
if ($_POST['password'] != $_POST['password_confirmation']) {
    $arr[] = 'password_not_equal';
}
if (!isset($_POST['type'])) {
    $arr[] = 'type';
}
if ($arr) {
    header("location:register?arr=" . implode(",", $arr));
    exit;
}
if ($_POST['type'] == 'patient') {
    $conect = new DbSql();
    if (!$conect) {
        echo mysqli_connect_error();
    }
    $patient = new Patient;
    $patient->fname = $conect->escapeString($_POST['fname']);
    $patient->lname = $conect->escapeString($_POST['lname']);
    $patient->email = $conect->escapeString($_POST['email']);
    $patient->blood = $conect->escapeString($_POST['blood']);
    $patient->password = $conect->escapeString($_POST['password']);
    $patient->password = crypt($patient->password, PASSWORD_DEFAULT);
    $patient->phone = $conect->escapeString($_POST['phone']);
    $patient->address = $conect->escapeString($_POST['address']);
    $patient->image = $conect->escapeString($_POST['image']);
    $querry = $conect->insertInto('patients', "name='$patient->fname $patient->lname',email='$patient->email',password='$patient->password',address='$patient->address',phone='$patient->phone',blood_type='$patient->blood',image='$patient->image'");
    if ($querry) {
        Session::set('user_type', 'patient');
        Session::set('user', $patient);
        header("location:");
        exit;
    }
} elseif ($_POST['type'] == 'donor') {
    $conect = new DbSql();
    if (!$conect) {
        echo mysqli_connect_error();
    }
    $donor = new Donor;
    $donor->fname = $conect->escapeString($_POST['fname']);
    $donor->lname = $conect->escapeString($_POST['lname']);
    $donor->email = $conect->escapeString($_POST['email']);
    $donor->blood = $conect->escapeString($_POST['blood']);
    $donor->password = $conect->escapeString($_POST['password']);
    $donor->password = crypt($password, PASSWORD_DEFAULT);
    $donor->phone = $conect->escapeString($_POST['phone']);
    $donor->address = $conect->escapeString($_POST['address']);
    $donor->image = $conect->escapeString($_POST['image']);
    $querry = $conect->insertInto('donors', "name='$donor->fname $donor->lname',email='$donor->email',password='$donor->password',address='$donor->address',phone='$donor->phone',blood_type='$donor->blood',image='$donor->image'");
    if ($querry) {
        Session::set('user_type', 'donor');
        Session::set('user', $donor);
        header("location:");
        exit;
    }
}
?>