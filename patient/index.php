<?php
// if(!isset($_SESSION['patient_id'])){
//     header("location:../visitor/index.php");
//     exit;
// }
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
                        <a class="nav-link" href="#"><i class="fa fa-home"></i> Home</a>
                    </li>
                    
                </ul>
                <button class="btn btn-danger" onclick="window.location.href = 'profile.html';"
                    style="width: 200px;"><i class="fa fa-user"></i> Profile</button>
                <button class="btn signup" onclick="window.location.href = '../backend/logout.php';">Logout <i class="fa fa-sign-out-alt"></i></button>
            </div>
        </nav>
        <?php
        if (isset($_GET['massage'])){?>
        <div class='alert alert-success alert-dismissible'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong><?php echo $_GET['massage'] ?></strong>
        </div>;
        <div style="height: 110px;"></div>
    <?php }
    ?>
    </section>
    <!-- Navbar 2 End -->
    
    

    <!-- Sub Header Start -->
    <section id="sub-header">
        <div class="container">
            <h3>A SINGLE PINT CAN SAVE THREE LIVES, A SINGLE GESTURE CAN CREATE A MILLION SMILES.</h3>
        </div>
    </section>
    <!-- Sub Header End -->

    <!-- * for patient -->
    <!-- Login Start -->
    <section id="login" class="mt-3">
        <div class="container">
            <h1 class="text-center font-weight-bold">Request For Donation</h1>
            <img src="imgs/logo.png" alt="">
            <form action="../backend/insert_in_patient_request.php" method="post">
                <select class="username" name="type" id="">
                    <option value="" disabled selected>Select Blood Type</option>
                    <option value="A-">A-</option>
                    <option value="A+">A+</option>
                    <option value="B-">B-</option>
                    <option value="B+">B+</option>
                    <option value="AB-">AB-</option>
                    <option value="AB+">AB+</option>
                    <option value="O-">O-</option>
                    <option value="O+">O+</option>
                </select>
                <!-- <input class="password" type="date" placeholder="Date" required> -->
                <div class="reg-group">
                    <button class="btn btn-danger" type="submit" 
                    style="width: 200px;">Send Request</button>
                </div>
            </form>
        </div>
    </section>
    <!-- Footer Start -->
    <section class="bg-dark text-light p-3 text-center">
        <div class="container">
            <h5>© Designed By Blood Bank Team</h5>
        </div>
    </section>
    <!-- Footer End -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script type="text/javascript" src="../js/swiper.min.js"></script>
    <script type="text/javascript" src="../js/wow.min.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>
</body>

</html>