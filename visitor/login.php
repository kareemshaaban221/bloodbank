<?php
use App\Core\Auth;
use App\Core\Request;
use App\Models\Admin;
use App\Models\Donor;
use App\Models\Patient;

session_start();
if (Request::method() === "post") {
    $conect = new DbSql();
    if (!$conect) {
        echo mysqli_connect_error();
    }

    $email = $conect->escapeString(Request::get('email'));
    $password = $conect->escapeString(Request::get('password'));
    $password = crypt($password, PASSWORD_DEFAULT);

    if (Request::get('type') && Request::get('type') == 'patient') {
        $result = $conect->get('patients', "email='$email' and password='$password' ");
        if ($row = mysqli_fetch_assoc($result)) {

            $user = new Patient;
            $user->setAllMembers($row);
            $user->type = 'patient';

            Auth::login($user);
            header("location:home");
            exit;

        } else {
            $error = "invalid email or Password";
        }
        mysqli_free_result($result);
    }
    else if (Request::get('type') && Request::get('type') == 'donor') {
        $result = $conect->get('donors', "email='$email' and password='$password' ");
        if ($row = mysqli_fetch_assoc($result)) {

            $user = new Donor;
            $user->setAllMembers($row);
            $user->type = 'donor';

            Auth::login($user);
            header("location:home");
            exit;

        } else {
            $error = "invalid email or Password";
        }
        mysqli_free_result($result);
    }
    else if (Request::get('type') && Request::get('type') == 'admin') {
        $result = $conect->get('admins', "email='$email' and password='$password' ");
        if ($row = mysqli_fetch_assoc($result)) {

            $user = new Admin;
            $user->setAllMembers($row);
            $user->type = 'admin';
            
            Auth::login($user);
            header("location:home");
            exit;

        } else {
            $error = "invalid email or Password";
        }
        mysqli_free_result($result);
    }
    else {
        $error_type = "select a user type";
    }
}

include 'layouts/components/header-parts/nav.php';
?>
<section id="login" class="mt-3">
    <div class="container">
        <h1 class="text-center font-weight-bold">Login</h1>
        <form method="post" action="login" class="w-75 m-auto">

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" class="form-control">
                <?php if (isset($error)): ?>
                    <span class='text-danger'>
                        * <?= $error ?>
                    </span>
                <?php endif; ?>
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
                <label for="type3"><i class="fa fa-user-tie"></i> Admin</label>
                <input type="radio" name="type" id="type3" value="admin" class="ml-2 mr-5">
                <?php if (isset($error_type)): ?>
                    <div class='text-danger'>
                        * <?= $error_type ?>
                    </div>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-danger p-1 m-0">Login</button>
            <a href="password-reset.html" class="ml-3 text-danger">Forget Password?</a>
        </form>
    </div>
</section>
<!-- Login End -->