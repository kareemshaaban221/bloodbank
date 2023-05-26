<?php
require('../backend/DB.php');
if(isset($_SESSION['donor_id'])){
    header("location:../visitor/index.php");
    exit;
}
if(!isset($_SESSION['donor_id'])){
    $conect=new DbSql();
    if(!$conect){
        echo mysqli_connect_error();
        exit;
    }
}
$conect=new DbSql();
$patient_requests1=$conect->get('patient_requests');
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

                    <li class="nav-item">
                        <a class="nav-link" href="my-donations.php"><i class="fa fa-list"></i> My Donations</a>
                    </li>
                </ul>
                <button class="btn btn-danger" onclick="window.location.href = 'profile.html';"
                    style="width: 200px;"><i class="fa fa-user"></i> Profile</button>
                    <button class="btn signup" onclick="window.location.href = '../backend/logout.php';">Logout <i class="fa fa-sign-out-alt"></i></button>
            </div>
        </nav>
    </section>
    <!-- Navbar 2 End -->

    <div style="height: 110px;"></div>

    <!-- Header Start -->
    <section id="header">
        <div class="container">
      </div>
    </section>
    <!-- Header End -->

    <!-- Sub Header Start -->
    <section id="sub-header">
        <div class="container">
            <h3>A SINGLE PINT CAN SAVE THREE LIVES, A SINGLE GESTURE CAN CREATE A MILLION SMILES.</h3>
        </div>
    </section>
    <!-- Sub Header End -->

    <!-- * for donnor -->
    <div class="row justify-content-around mt-5">
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <h3 class="card-title ml-3 font-weight-bold">Donation Requests</h4>
                        <select onchange="filter(this)" class="mb-2 mr-3">
                            <option value="">--</option>
                            <option value="">A-</option>
                            <option value="">A+</option>
                            <option value="">B-</option>
                            <option value="">B+</option>
                            <option value="">AB-</option>
                            <option value="">AB+</option>
                            <option value="">O-</option>
                            <option value="">O+</option>
                        </select>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Patient</th>
                                    <th>Blood Type</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                while ($patient_requests=mysqli_fetch_assoc($patient_requests1)) {?>
                                    <tr>
                                        <?php 
                                        $patient_id=$patient_requests['patient_id'];
                                        $patient=$conect->get('patients',"id=$patient_id");
                                        $patient=mysqli_fetch_assoc($patient);
                                        $name=$patient['name'];
                                        $blood=$patient_requests['blood_type'];
                                        echo "<td>$name</td>"
                                        ?>
                                        <td><?php echo $blood?></td>
                                        <td><a href='../backend/insert_in_doner_request.php?blood=<?php echo $blood?>'
                                        onclick="return confirm('Are u sure u want to send donnation request?')" class='btn btn-danger'><i class='fa fa-hand-holding-heart'></i>Donate?</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

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