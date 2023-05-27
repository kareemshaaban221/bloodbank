<?php
use App\Core\Auth;
use App\Core\Request;
if ($_SERVER['REQUEST_METHOD'] === "GET") {
    $conect = new DbSql();
    if (!$conect) {
        echo mysqli_connect_error();
    }
    // $id = Auth::user()->id;
    $id=Request::get('id');
    // dd($id);
    $donor_request=$conect->get('donor_requests',"id='$id'");
    $donor_request=mysqli_fetch_assoc($donor_request);
    $conect->update('donor_requests',"status='rejected'","id=$id");
    header("location:home");
    exit;
}