<?php
require('../backend/DB.php');
$arr_error=[];
if(isset($_GET['arr'])){
    $arr_error=explode(",",$_GET['arr']);
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
            <h1 class="text-center font-weight-bold">Create Account</h1>
            <form method="post" action="../backend/insert.php" class="w-75 m-auto">
                <div class="row">
                    <div class="form-group col">
                        <label for="fname">First Name</label>
                        <input id="fname" name="fname" type="text" class="form-control">
                        <p class="text-danger"><?php if (in_array('fname',$arr_error)) {echo "enter your fname";} ?></p>
                    </div>
                    <div class="form-group col">
                        <label for="lname">Last Name</label>
                        <input id="lname" name="lname" type="text" class="form-control">
                        <p class="text-danger"><?php if (in_array('lname',$arr_error)) {echo "enter your lname";} ?></p>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" class="form-control">
                    <p class="text-danger"><?php if (in_array('email',$arr_error)) {echo "enter your email";} ?></p>
                </div>
                
                <div class="row">
                    <div class="form-group col">
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" class="form-control">
                        <p class="text-danger"><?php if (in_array('password',$arr_error)) {echo "enter your password";} ?></p>
                        <p class="text-danger"><?php if (in_array('password_not_equal',$arr_error)) {echo "enter the same password";} ?></p>
                    </div>
                    <div class="form-group col">
                        <label for="password_confirmation">Confirm Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control">
                        <p class="text-danger"><?php if (in_array('password_confirmation',$arr_error)) {echo "enter your password confirmation";} ?></p>
                        <p class="text-danger"><?php if (in_array('password_not_equal',$arr_error)) {echo "enter the same password";} ?></p>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="blood">Blood Type</label>
                    <select id="blood" name="blood" class="form-control">
                        <option value="A">A</option>
                        <option value="AB">AB</option>
                        <option value="B+">B+</option>
                    </select>
                    <p class="text-danger"><?php if (in_array('blood',$arr_error)) {echo "select your blood";} ?></p>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input id="address" name="address" type="address" class="form-control">
                    <p class="text-danger"><?php if (in_array('address',$arr_error)) {echo "enter your address";} ?></p>
                    <!-- <p class="text-danger"><?php if (in_array('string',$arr_error)) {echo "address must be string";} ?></p> -->
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input id="phone" name="phone" type="phone" class="form-control">
                    <p class="text-danger"><?php if (in_array('phone',$arr_error)) {echo "enter your phone";} ?></p>
                    <!-- <p class="text-danger"><?php if (in_array('integer',$arr_error)) {echo "phone must be numbers";} ?></p> -->
                </div>

                <div class="form-group">
                    <label for="type"><i class="fa fa-user"></i> Patient</label>
                    <input type="radio" name="type" value="patient" id="type" class="ml-2 mr-5">
                    <label for="type2"><i class="fa fa-hand-holding-heart"></i> Donor</label>
                    <input type="radio" name="type" id="type2" value="donor" class="ml-2 mr-5">
                    <p class="text-danger"><?php if (in_array('type',$arr_error)) {echo "select your type";} ?></p>
                </div>

                <div class="form-group">
                    <label for="image">Profile Image</label>
                    <input id="image" name="image" type="file" class="form-control-file">
                </div>

                <button type="submit" class="btn btn-danger p-1 m-0">Register</button>
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
                       
                    </ul>
                </div>
            
            </div>
        </div>
    </section>
    <!-- Footer End -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, thentext
text Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script type="text/javascript" src="js/swiper.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>