<?php
require('../backend/DB.php');
if(isset($_SESSION['donor_id'])){
    $conect=new DbSql();
    if(!$conect){
        echo mysqli_connect_error();
        exit;
    }
}
$conect=new DbSql();
$donor_requests1=$conect->get('donor_requests');
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
                        <a class="nav-link" href="index.html"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <!-- TODO for donor -->
                    <li class="nav-item">
                        <a class="nav-link" href="my-donations.html"><i class="fa fa-list"></i> My Donations</a>
                    </li>
                   
                </ul>
                <button class="btn btn-danger" onclick="window.location.href = 'profile.html';"
                    style="width: 200px;"><i class="fa fa-user"></i> Profile</button>
                <button class="btn signup" onclick="window.location.href = '../visitor/index.php';">Logout <i class="fa fa-sign-out-alt"></i></button>
            </div>
        </nav>
    </section>
    <!-- Navbar 2 End -->

    <div style="height: 110px;"></div>

   
    <!-- Sub Header Start -->
    <section id="sub-header">
        <div class="container">
            <h3>A SINGLE PINT CAN SAVE THREE LIVES, A SINGLE GESTURE CAN CREATE A MILLION SMILES.</h3>
        </div>
    </section>
    <!-- Sub Header End -->

    <div class="row justify-content-around mt-5 mb-5" id="reqs">
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <h3 class="card-title ml-3 font-weight-bold">My Donations</h4>
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
                                    <th>#</th>
                                    <th>Blood Type</th>
                                    <td>Date</td>
                                    <td>Hospital</td>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i=0;
                                while ($donor_requests=mysqli_fetch_assoc($donor_requests1)) {?>
                                    <tr>
                                        <?php 
                                        ++$i;
                                        echo "<td>$i</td>"
                                        ?>
                                        <?php
                                        if($donor_requests['status']=='pending' || $donor_requests['status']=='rejected'){
                                            $blood=$donor_requests['blood_type'];
                                            ?>
                                            <td><?php echo $blood?></td>
                                            <td>--</td>
                                            <td>--</td>
                                            <td><span class="badge badge-warning">pending</span></td>                                    </tr>
                                        <?php 
                                        }
                                        ?>
                                <?php } ?>
                                <tr>
                                    <td>2</td>
                                    <td>O-</td>
                                    <td>--</td>
                                    <td>--</td>
                                    <td><span class="badge badge-danger">rejected</span></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>A+</td>
                                    <td>--</td>
                                    <td>--</td>
                                    <td><span class="badge badge-warning">pending</span></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>A+</td>
                                    <td>16 May 2017</td>
                                    <td>Rabea Hospital</td>
                                    <td><span class="badge badge-success">accepted</span></td>
                                </tr>
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