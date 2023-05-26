<?php
require('../backend/DB.php');
$arr=[];
if(!(isset($_POST['type'])) || empty($_POST['type'])){
$arr[]='type';
}
if($arr){
    header("location:../patient/index.php?arr=".implode(",",$arr));
    exit;
}
session_start();
    if($_SERVER['REQUEST_METHOD']==="POST"){
        $conect=new DbSql();
        if(!$conect){
            echo mysqli_connect_error();
        }
        $type=$conect->escapeString($_POST['type']); 
        $id=$_SESSION['patient_id'];
            $querry=$conect->insertInto('patient_requests',"patient_id='$id',blood_type='$type'");
            if($querry){
                $massage='the request has been send successfully';
                header("location:../patient/index.php?massage=".$massage);
                exit;
            }
        }
?>