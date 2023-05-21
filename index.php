<?php
require('DB.php');
session_start();
    if(isset($_SESSION['id'])){
      header("location:index1.php");
      exit;
    }
    if($_SERVER['REQUEST_METHOD']==="POST"){
        // $conect=mysqli_connect('localhost','root','','form_user');
        $conect=new DbSql();
        if(!$conect){
            echo mysqli_connect_error();
        }
        $email=$conect->escapeString($_POST['email']);
        $pass=$conect->escapeString($_POST['pass']); 
        // $querry="SELECT * FROM `users` WHERE `name`='".$name."' and `email`='".$email."' LIMIT 1";get
        $result=$conect->get('admins',"email='$email' and password='$pass'");
        if($row=mysqli_fetch_assoc($result)){
            $_SESSION['id']=$row['id'];
            $_SESSION['email']=$row['email'];
            $_SESSION['pass']=$row['password'];
            $_SESSION['name']=$row['name'];
            header("location:index1.php");
            exit;
        }
        else{
            $error="invalid email or Password";
        }
        mysqli_free_result($result);
        // mysqli_close($conect);
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
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
                <h3 class="card-title text-left mb-3">Login</h3>
                <form method="post">
                  <div class="form-group">
                    <?php if(isset($error)) echo $error ."<br>";?>
                  </div>
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" name="email" id="email" class="form-control p_input" value="<?= isset($_POST['email']) ? $_POST['email']:'' ?>">
                  </div>
                  <div class="form-group">
                    <label for="pass" >Password *</label>
                    <input type="password" name="pass" id="pass" class="form-control p_input">
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <!-- <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"> Remember me </label>
                    </div> -->
                    <a href="#" class="forgot-pass">Forgot password</a>
                  </div>
                  <div class="text-center">
                    <input type="submit" name="submit" value="Login" class="btn btn-primary btn-block enter-btn">
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