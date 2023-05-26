<?php
require('../backend/DB.php');
session_start();
        $conect=new DbSql();
        if(!$conect){
            echo mysqli_connect_error();
        }
        if(isset($_SESSION['donor_id'])){
            $id=$_SESSION['donor_id'];
            $blood=$_GET['blood'];
            $querry=$conect->insertInto('donor_requests',"donor_id='$id',blood_type='$blood' ,status='pending'");
            if($querry){
                $massage='the request has been send successfully';
                header("location:../donor/index.php?massage=".$massage);
                exit;
            }
        }
?>