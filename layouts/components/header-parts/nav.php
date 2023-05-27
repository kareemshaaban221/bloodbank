<?php
    use App\Core\Auth;
?>

<!-- Navbar 2 Start -->
<section id="Nav2" class="fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="<?= asset('imgs/logo.png') ?>" width="7%">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <!-- TODO for all -->
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><i class="fa fa-home"></i> Home</a>
                </li>

                <?php if (Auth::check() && Auth::user_type() == 'donor'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="my_donations"><i class="fa fa-list"></i> My Donations</a>
                    </li>
                <?php endif; ?>
                <?php if (Auth::check() && Auth::user_type() == 'admin'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="patients"><i class="fa fa-list"></i> Patients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="donors"><i class="fa fa-list"></i> Donors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="patient_requests"><i class="fa fa-list"></i> Patient Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="donor_requests"><i class="fa fa-list"></i> Donor Requests</a>
                    </li>
                    <?php endif; ?>
            </ul>

            <?php if (Auth::check()): ?>
                <button class="btn btn-danger" onclick="window.location.href = 'profile';"
                    style="width: 200px;"><i class="fa fa-user"></i> Profile</button>
                <button class="btn signup" onclick="window.location.href = 'logout';">Logout <i class="fa fa-sign-out-alt"></i></button>
            <?php else: ?>
                <button class="btn signup" onclick="window.location.href = 'register';">New Account</button>
                <button class="btn btn-danger" onclick="window.location.href = 'login';"
                    style="width: 200px;">Login</button>
            <?php endif; ?>
        </div>
    </nav>
</section>
<!-- Navbar 2 End -->

<div style="height: 110px;"></div>