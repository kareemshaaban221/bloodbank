<?php

use App\Core\Request;

    include 'layouts/components/header-parts/nav.php';
    include 'layouts/components/header-parts/header2.php';
?>

<?php if (Request::get('massage')): ?>
    <div class='alert alert-success alert-dismissible text-center' style="position: fixed; bottom: 5px; right: 5px; z-index: 99999">
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <strong>
            <?= Request::get('massage') ?>
        </strong>
    </div>
<?php endif; ?>
<?php if (Request::get('dublicat')): ?>
    <div class='alert alert-danger alert-dismissible text-center' style="position: fixed; bottom: 5px; right: 5px; z-index: 99999">
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <strong>
            <?= Request::get('dublicat') ?>
        </strong>
    </div>
<?php endif; ?>

<!-- * for patient -->
<!-- Login Start -->
<section id="login" class="mt-3">
    <div class="container">
        <h1 class="text-center font-weight-bold">Request For Donation</h1>
        <img src="<?= asset('imgs/logo.png') ?>" alt="">
        <form action="request_store" method="post">
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
                <button class="btn btn-danger" type="submit" style="width: 200px;">Send Request</button>
            </div>
        </form>
    </div>
</section>