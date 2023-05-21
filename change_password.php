<?php
require('DB.php');
session_start();
if(!isset($_SESSION['id'])){
    header("location:login.php");
        exit;
}

if(isset($_SESSION['id'])){
    $id=$_SESSION['id'];
    // $conect= mysqli_connect('localhost','root','','form_user');
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

$result=$conect->get('admins',"id=$id");
$row=mysqli_fetch_assoc($result);
$arr=[];
if($_SERVER['REQUEST_METHOD']==="POST"){
    if(!(isset($_POST['pass'])) || empty($_POST['pass'])){
        $arr[]='pass';
    }
    if(strlen($_POST['pass'])<8){
        $arr[]='less_8';
    }
    if(!(isset($_POST['pass_confirm'])) || empty($_POST['pass_confirm'])){
        $arr[]='pass_confirm';
    }
    if(!$arr){
        $pass=$conect->escapeString($_POST['pass']);
        $pass_confirm=$conect->escapeString($_POST['pass_confirm']);
        // $address=$conect->escapeString($_POST['address']);
        // $querry="UPDATE `users` SET `name`='".$name."' , `email`='".$email."' ,`address`='".$address."' WHERE `id`=".$id."";
        $querry=$conect->update('admins',"password=$pass_confirm","id=$id");
            if($querry & $pass==$pass_confirm){
                $_SESSION['updated']='the password has been updated';
                header("location:index1.php");
                exit;
            }
            else{
                $arr[]='not_match';
            }
            
}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Change Password</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Change Password</h3>
                <form method="post">
                  <div class="form-group">
                    <?php if (in_array('not_match',$arr)) {echo "the password dos not match";} ?>
                    <?php if (in_array('less_8',$arr)) {echo "the password must be 8 character";} ?>
                  </div>
                  <div class="form-group">
                    <label for="pass" >Password *</label>
                    <input type="password" name="pass" id="pass" class="form-control p_input" placeholder="<?php if (in_array('pass',$arr)) {echo "enter a new password";} ?>">
                  </div>
                  <div class="form-group">
                    <label for="pass_confirm" >Confirm Password *</label>
                    <input type="password" name="pass_confirm" id="pass_confirm" class="form-control p_input" placeholder="<?php if (in_array('pass_confirm',$arr)) {echo "enter a confirmation password";} ?>">
                  </div>
                    <input type="submit" name="change" value="change" class="btn btn-primary btn-block enter-btn">
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>