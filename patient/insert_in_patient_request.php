<?php

use App\Core\Auth;
use App\Core\Request;

$arr = [];
if (!Request::get('type') || empty(Request::get('type'))) {
    $arr[] = 'type';
}
if ($arr) {
    header("location:home?arr=" . implode(",", $arr));
    exit;
}
session_start();
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $conect = new DbSql();
    if (!$conect) {
        echo mysqli_connect_error();
    }
    $type = $conect->escapeString(Request::get('type'));
    $id = Auth::user()->id;
    $querry = $conect->insertInto('patient_requests', "patient_id='$id',blood_type='$type'");
    if ($querry) {
        $massage = 'the request has been send successfully';
        header("location:home?massage=" . $massage);
        exit;
    }
}
?>