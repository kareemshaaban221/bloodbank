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
    $conect->delete('donner_requests',"id=$id_donner_request");
    header("location:donner_request_table.php");
}
?>