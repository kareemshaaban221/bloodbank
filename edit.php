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
    if(!(isset($_POST['name'])) || empty($_POST['name'])){
        $arr[]='name';
    }
    if(!(isset($_POST['email'])) || empty($_POST['email'])){
        $arr[]='email';
    }
    if(!$arr){
        $name=$conect->escapeString($_POST['name']);
        $email=$conect->escapeString($_POST['email']);
        // $address=$conect->escapeString($_POST['address']);
        // $querry="UPDATE `users` SET `name`='".$name."' , `email`='".$email."' ,`address`='".$address."' WHERE `id`=".$id."";
        $querry=$conect->update('admins',"name='$name',email='$email'","id=$id");
            if($querry){
                $_SESSION['updated_acc']='the account has been updated';
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
    <title>Edit Account</title>
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
                <h3 class="card-title text-left mb-3">Edit Account</h3>
                <form method="post">
                  <input type="number" name="id" hidden id="id" value="<?= isset($row['id']) ? $row['id']:'' ?>">
                  <div class="form-group">
                    <?php if (in_array('not_match',$arr)) {echo "the email is invalid";} ?>
                    <?php if (in_array('name',$arr)) {echo "the name can not be empty";} ?>
                    <?php if (in_array('email',$arr)) {echo "the email can not be empty";} ?>
                  </div>
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" name="name" id="name" placeholder="Enter Your Name" class="form-control p_input" value="<?= isset($_SESSION['name']) ? $_SESSION['name']:'' ?>">
                  </div>
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" name="email" id="email" placeholder="Enter Your Email" class="form-control p_input" value="<?= isset($_SESSION['email']) ? $_SESSION['email']:'' ?>">
                  </div>
                  <div class="text-center">
                    <input type="submit" name="submit" value="Edit" class="btn btn-primary btn-block enter-btn">
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