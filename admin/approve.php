<?php
use App\Core\Auth;
use App\Core\Request;
$arr = [];
if (!Request::get('date') || empty(Request::get('date'))) {
    $arr[] = 'date';
}
if (!Request::get('hospital') || empty(Request::get('hospital'))) {
    $arr[] = 'hospital';
}
if ($arr) {
    header("location:home?arr=" . implode(",", $arr));
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $conect = new DbSql();
    if (!$conect) {
        echo mysqli_connect_error();
    }
    $id=Request::get('id');
    $hospital=$_POST['hospital'];
    $date=$_POST['date'];
    dd($date);
    $conect->update('donor_requests',"status='accepted',hospital='$hospital',date='$date'","id=$id");
    header("location:home");
    exit;
}