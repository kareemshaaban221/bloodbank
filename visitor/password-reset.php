<?php

use App\Core\Request;
use App\Core\Session;
use App\Models\Patient;

if (Request::method() === "post") {
    $conect = new DbSql();
    if (!$conect) {
        echo mysqli_connect_error();
    }

    $email = $conect->escapeString(Request::get('email'));

    if (Request::get('type')) {
        if (Request::get('type') == 'patient') {

            $result = $conect->get('patients', "email='$email'");
            if ($row = mysqli_fetch_assoc($result)) {

                Session::set('form.email', $email);
                Session::set('form.type', 'patient');
                header("location:password_reset");
                exit;

            } else {
                $error = "invalid email";
            }
            mysqli_free_result($result);

        } else if (Request::get('type') == 'donor') {

            $result = $conect->get('donors', "email='$email'");
            if ($row = mysqli_fetch_assoc($result)) {

                Session::set('form.email', $email);
                Session::set('form.type', 'donor');
                header("location:password_reset");
                exit;

            } else {
                $error = "invalid email";
            }
            mysqli_free_result($result);

        } else if (Request::get('type') == 'admin') {

            $result = $conect->get('admins', "email='$email'");
            if ($row = mysqli_fetch_assoc($result)) {

                Session::set('form.email', $email);
                Session::set('form.type', 'admin');
                header("location:password_reset");
                exit;

            } else {
                $error = "invalid email";
            }
            mysqli_free_result($result);

        } else {
            $error = 'invalid user type';
        }
    } else {
        $error_type = 'select a user type';
    }
}

include 'layouts/components/header-parts/nav.php';
include 'layouts/components/header-parts/header2.php'
?>

<?php if (Request::get('error')): ?>
    <div class='alert alert-danger alert-dismissible text-center' style="position: fixed; bottom: 5px; right: 5px; z-index: 99999">
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <strong>
            <?= Request::get('error') ?>
        </strong>
    </div>
<?php endif; ?>

<!-- Login Start -->
<section id="login" class="mt-3">
    <div class="container">
        <h1 class="text-center font-weight-bold">Reset Password</h1>
        <form action="password_reset_email" method="post" class="w-75 m-auto">

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" class="form-control">
                <?= isset($error) ? "<div class='text-danger'>* $error</div>" : '' ?>
            </div>

            <div class="form-group">
                <label for="type"><i class="fa fa-user"></i> Patient</label>
                <input type="radio" name="type" value="patient" id="type" class="ml-2 mr-5">
                <label for="type2"><i class="fa fa-hand-holding-heart"></i> Donor</label>
                <input type="radio" name="type" value="donor" id="type2" class="ml-2 mr-5">
                <label for="type3"><i class="fa fa-user-tie"></i> Admin</label>
                <input type="radio" name="type" value="admin" id="type3" class="ml-2 mr-5">
                <?= isset($error_type) ? "<div class='text-danger'>* $error_type</div>" : '' ?>
            </div>

            <button type="submit" class="btn btn-danger w-100 p-1 m-0">Continue</button>
        </form>
    </div>
</section>
<!-- Login End -->