<!-- Navbar 2 Start -->
<section id="Nav2" class="fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="<?= asset('imgs/logo.png') ?>" width="7%">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <!-- TODO for all -->
                <li class="nav-item">
                    <a class="nav-link selected" href="index.php"><i class="fa fa-home"></i> Home</a>
                </li>

            </ul>
            <button class="btn signup" onclick="window.location.href = 'register';">New Account</button>
            <button class="btn btn-danger" onclick="window.location.href = 'login';"
                style="width: 200px;">Login</button>
        </div>
    </nav>
</section>
<!-- Navbar 2 End -->

<div style="height: 110px;"></div>