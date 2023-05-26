<?php

use function PHPSTORM_META\type;

require('../backend/DB.php');
$arr=[];
if(!(isset($_POST['fname'])) || empty($_POST['fname'])){
$arr[]='fname';
}
if(!(isset($_POST['lname'])) || empty($_POST['lname'])){
$arr[]='lname';
}
if(!(isset($_POST['email'])) || !filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL)){
    $arr[]='email';
}
if(!(isset($_POST['blood'])) || empty($_POST['blood'])){
    $arr[]='blood';
}
if(!(isset($_POST['address'])) || empty($_POST['address'])){
    $arr[]='address';
}
// if(gettype($_POST['address']!='string')){
//     $arr[]='string';
// }
if(!(isset($_POST['phone'])) || empty($_POST['phone'])){
    $arr[]='phone';
}
// if(gettype($_POST['phone']!='integer')){
//     $arr[]='integer';
// }
if(!(isset($_POST['password'])) || empty($_POST['password'])){
    $arr[]='password';
}
if(!(isset($_POST['password_confirmation'])) || empty($_POST['password_confirmation'])){
    $arr[]='password_confirmation';
}
if($_POST['password']!=$_POST['password_confirmation']){
    $arr[]='password_not_equal';
}
if(!isset($_POST['type'])){
    $arr[]='type';
}
if($arr){
    header("location:../visitor/signup.php?arr=".implode(",",$arr));
    exit;
}
if($_POST['type']=='patient'){
    $conect=new DbSql();
    if(!$conect){
        echo mysqli_connect_error();
    }
    $fname=$conect->escapeString($_POST['fname']);
    $lname=$conect->escapeString($_POST['lname']);
    $email=$conect->escapeString($_POST['email']);
    $blood=$conect->escapeString($_POST['blood']);
    $password=$conect->escapeString($_POST['password']);
    // $password=password_hash($password, PASSWORD_DEFAULT);
    $phone=$conect->escapeString($_POST['phone']);
    $address=$conect->escapeString($_POST['address']);
    $image=$conect->escapeString($_POST['image']);
    $querry=$conect->insertInto('patients',"name='$fname $lname',email='$email',password='$password',address='$address',phone='$phone',blood_type='$blood',image='$image'");
    if($querry){
        $_SESSION['user_type'] = 'patient';
        header("location:localhost/bloodbank/index");
        exit;
    }
}
elseif($_POST['type']=='donor'){
    // $conect= mysqli_connect('localhost','root','','form_user');
    $conect=new DbSql();
    if(!$conect){
        echo mysqli_connect_error();
    }
    $fname=$conect->escapeString($_POST['fname']);
    $lname=$conect->escapeString($_POST['lname']);
    $email=$conect->escapeString($_POST['email']);
    $blood=$conect->escapeString($_POST['blood']);
    $password=$conect->escapeString($_POST['password']);
    $password=password_hash($password, PASSWORD_DEFAULT);
    $phone=$conect->escapeString($_POST['phone']);
    $address=$conect->escapeString($_POST['address']);
    $image=$conect->escapeString($_POST['image']);
    // $querry="INSERT INTO users (`name`,`address`,`email`) VALUES ('$name','$address','$email')";
    $querry=$conect->insertInto('donors',"name='$fname $lname',email='$email',password='$password',address='$address',phone='$phone',blood_type='$blood',image='$image'");
    if($querry){
        header("location:../donor/index.php");
        exit;
    }
}
?>