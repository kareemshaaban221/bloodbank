<?php
require "../../DB.php";
$massages=[];
session_start();
if(isset($_SESSION['id'])){
  $conect=new DbSql();
  if(!$conect){
      echo mysqli_connect_error();
      exit;
  }
}
else{
    header("location:../../index.php");
    exit;
}
if(isset($_GET['id'])){
    $id_donner_request=$_GET['id'];
    $requests=$conect->get('donner_requests',"id=$id_donner_request");
    $requests=mysqli_fetch_assoc($requests);
    $name=$requests['name'];
    $email=$requests['email'];
    $blood_type=$requests['blood_type'];
    $hospital=$requests['hospital'];
    $date=$requests['date'];
    $blood_stock=$conect->insertInto('blood_stock',"name='$name',email='$email',blood_type='$blood_type',hospital='$hospital',date='$date'");
    $conect->delete('donner_requests',"id=$id_donner_request");
    header("location:blood_stock.php");
}
?>