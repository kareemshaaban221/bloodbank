<?php
require('../backend/DB.php');
session_start();
    if($_SERVER['REQUEST_METHOD']==="POST"){
        $conect=new DbSql();
        if(!$conect){
            echo mysqli_connect_error();
        }
        $email=$conect->escapeString($_POST['email']); 
        $password=$conect->escapeString($_POST['password']);
        $password=crypt($password, PASSWORD_DEFAULT);
        if($_POST['type']=='patient'){
            $result=$conect->get('patients',"email='$email' and password='$password' ");
            if($row=mysqli_fetch_assoc($result)){
                $_SESSION['patient_id']=$row['id'];
                $_SESSION['patient_name']=$row['name'];
                $_SESSION['patient_email']=$row['email'];
                $_SESSION['patient_address']=$row['address'];
                $_SESSION['patient_phone']=$row['phone'];
                $_SESSION['patient_blood_type']=$row['blood_type'];
                $_SESSION['patient_image']=$row['image'];
                $_SESSION['user_type']='patient';
                header("location:../patient/index.php");
                exit;
            }
            else{
                $error="invalid email or Password";
            }
            mysqli_free_result($result);
        }
        if($_POST['type']=='donor'){
            $result=$conect->get('donors',"email='$email' and password='$password' ");
            if($row=mysqli_fetch_assoc($result)){
                $_SESSION['donor_id']=$row['id'];
                $_SESSION['donor_name']=$row['name'];
                $_SESSION['donor_email']=$row['email'];
                $_SESSION['donor_address']=$row['address'];
                $_SESSION['donor_phone']=$row['phone'];
                $_SESSION['donor_blood_type']=$row['blood_type'];
                $_SESSION['donor_image']=$row['image'];
                $_SESSION['user_type']='donor';
                header("location:../donor/index.php");
                exit;
            }
            else{
                $error="invalid email or Password";
            }
            mysqli_free_result($result);
        }
        if($_POST['type']=='admin'){
            $password=$conect->escapeString($_POST['password']);
            $result=$conect->get('admins',"email='$email' and password='$password' ");
            if($row=mysqli_fetch_assoc($result)){
                $_SESSION['admin_id']=$row['id'];
                $_SESSION['admin_name']=$row['name'];
                $_SESSION['admin_email']=$row['email'];
                $_SESSION['admin_image']=$row['image'];
                $_SESSION['user_type']='admin';
                header("location:../admin/index.php");
                exit;
            }
            else{
                $error="invalid email or Password";
            }
            mysqli_free_result($result);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />


    <!-- website font  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="../css/animate.css" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />

    <title>Blood Bank</title>
</head>

<body>
    <!-- Navbar 2 Start -->
    <section id="Nav2" class="fixed-top">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <img src="../imgs/logo.png" width="7%">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <!-- TODO for all -->
                    <li class="nav-item">
                        <a class="nav-link selected" href="index.php"><i class="fa fa-home"></i> Home</a>
                    </li>
                
                </ul>
                <button class="btn signup" onclick="window.location.href = 'signup.php';">New Account</button>
                <button class="btn btn-danger" onclick="window.location.href = 'login.php';"
                    style="width: 200px;">Login</button>
            </div>
        </nav>
    </section>
    <!-- Navbar 2 End -->

    <div style="height: 110px;"></div>
    <!-- Login Start -->
    <section id="login" class="mt-3">
        <div class="container">
            <h1 class="text-center font-weight-bold">Login</h1>
            <form method="post" action="login.php" class="w-75 m-auto">
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" class="form-control">
                    <b><?php if(isset($error)) echo $error ."<br>";?></b>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="type"><i class="fa fa-user"></i> Patient</label>
                    <input type="radio" name="type" id="type" value="patient" class="ml-2 mr-5">
                    <label for="type2"><i class="fa fa-hand-holding-heart"></i> Donor</label>
                    <input type="radio" name="type" id="type2" value="donor" class="ml-2 mr-5">
                    <label for="type3"><i class="fa fa-hand-holding-heart"></i> Admin</label>
                    <input type="radio" name="type" id="type3" value="admin" class="ml-2 mr-5">
                </div>

                <button type="submit" class="btn btn-danger p-1 m-0">Login</button>
                <a href="password-reset.html" class="ml-3 text-danger">Forget Password?</a>
            </form>
        </div>
    </section>
    <!-- Login End -->

    <!-- Footer Start -->
    <section id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="foot-info">
                        <img src="imgs/logo.png" alt="">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quos ut sit natus earum ea cum
                            doloremque fugit. Sit non ex suscipit fugiat molestias, ipsa rerum tempore voluptates
                            adipisci rem cum?</p>
                    </div>
                </div>
                <div class="col">
                    <ul class="menu">
                        <a href="index.html">
                            <li><i class="fa fa-home"></i> Home</li>
                        </a>
                        <!-- <a href="About-us.html">
                            <li><i class="fa fa-ambulance"></i> Requests</li>
                        </a>
                        <a href="#articles">
                            <li><i class="fa fa-hands-helping"></i> Request For Donation</li>
                        </a>
                        <a href="requests.html">
                            <li><i class="fa fa-hand-holding-heart"></i> Donate ?</li>
                        </a>
                        <a href="who-we-are.html">
                            <li><i class="fa fa-heartbeat"></i> Blood Types</li>
                        </a>
                        <a href="contact-us.html">
                            <li><i class="fa fa-user"></i> Profile</li>
                        </a> -->
                    </ul>
                </div>
                <!-- <div class="col-md-4">
                    <ul class="options">
                        <li>
                            <h5>Available On</h5>
                        </li>
                        <li><img src="imgs/ios1.png" alt=""></li>
                        <li><img src="imgs/google1.png" alt=""></li>
                    </ul>
                </div> -->
            </div>
        </div>
    </section>
    <!-- Footer End -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script type="text/javascript" src="js/swiper.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>