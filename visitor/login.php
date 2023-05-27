<?php
use App\Core\Session;
use App\Models\Admin;
use App\Models\Donor;
use App\Models\Patient;

require 'backend/DB.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $conect = new DbSql();
    if (!$conect) {
        echo mysqli_connect_error();
    }
    $email = $conect->escapeString($_POST['email']);
    $password = $conect->escapeString($_POST['password']);
    $password = crypt($password, PASSWORD_DEFAULT);
    if ($_POST['type'] == 'patient') {
        $result = $conect->get('patients', "email='$email' and password='$password' ");
        if ($row = mysqli_fetch_assoc($result)) {
            $patient = new Patient;
            $patient->setAllMembers($row);
            Session::set('user', $patient);
            Session::set('user_type', 'patient');
            header("location:home");
            exit;
        } else {
            $error = "invalid email or Password";
        }
        mysqli_free_result($result);
    }
    else if ($_POST['type'] == 'donor') {
        $result = $conect->get('donors', "email='$email' and password='$password' ");
        if ($row = mysqli_fetch_assoc($result)) {
            $donor = new Donor;
            $donor->setAllMembers($row);
            Session::set('user', $donor);
            Session::set('user_type', 'donor');
            header("location:home");
            exit;
        } else {
            $error = "invalid email or Password";
        }
        mysqli_free_result($result);
    }
    else if ($_POST['type'] == 'admin') {
        $password = $conect->escapeString($_POST['password']);
        $result = $conect->get('admins', "email='$email' and password='$password' ");
        if ($row = mysqli_fetch_assoc($result)) {
            $admin = new Admin;
            $admin->setAllMembers($row);
            Session::set('user', $admin);
            Session::set('user_type', 'admin');
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