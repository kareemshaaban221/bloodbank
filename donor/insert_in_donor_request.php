<?php
use App\Core\Auth;
use App\Core\Request;
use App\Models\Donor;
use App\Models\Patient;
use App\Models\PatientRequest;
if ($_SERVER['REQUEST_METHOD'] === "GET") {
    $conect = new DbSql();
    if (!$conect) {
        echo mysqli_connect_error();
    }
    $id = Auth::user()->id;
    $blood=Request::get('blood');
    $check_for_dublicat=$conect->get('donor_requests',"donor_id='$id' and blood_type='$blood' ");
    $check_for_dublicat=mysqli_fetch_assoc($check_for_dublicat);
    if($check_for_dublicat==null){
        $querry = $conect->insertInto('donor_requests',"donor_id='$id',blood_type='$blood' ,status='pending'");
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