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
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $conect = new DbSql();
    if (!$conect) {
        echo mysqli_connect_error();
    }
    $type = $conect->escapeString(Request::get('type'));
    $id = Auth::user()->id;
    $check_for_dublicat=$conect->get('patient_requests',"patient_id='$id' and blood_type='$type'");
    $check_for_dublicat=mysqli_fetch_assoc($check_for_dublicat);
    if($check_for_dublicat==null){
        $querry = $conect->insertInto('patient_requests', "patient_id='$id',blood_type='$type'");
        if ($querry) {
            $massage = 'the request has been send successfully';
            header("location:home?massage=" . $massage);
            exit;
        }
    }
    else{
        $dublicat = 'the request has sent before';
            header("location:home?dublicat=" . $dublicat);
            exit;
    }
}
?>