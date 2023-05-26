<?php
require 'backend/DB.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $conect = new DbSql();
    if (!$conect) {
        echo mysqli_connect_error();
    }
    $email = $conect->escapeString($_POST['email']);
    $password = $conect->escapeString($_POST['password']);
    // $password=password_hash($password, PASSWORD_DEFAULT);
    if ($_POST['type'] == 'patient') {
        $result = $conect->get('patients', "email='$email' and password='$password' ");
        if ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['patient_id'] = $row['id'];
            $_SESSION['patient_name'] = $row['name'];
            $_SESSION['patient_email'] = $row['email'];
            $_SESSION['patient_address'] = $row['address'];
            $_SESSION['patient_phone'] = $row['phone'];
            $_SESSION['patient_blood_type'] = $row['blood_type'];
            $_SESSION['patient_image'] = $row['image'];
            header("location:../patient/index.php");
            exit;
        } else {
            $error = "invalid email or Password";
        }
        mysqli_free_result($result);
        // mysqli_close($conect);
    }
}

include 'layouts/components/header-parts/nav.php';
?>

<!-- Login Start -->
<section id="login" class="mt-3">
    <div class="container">
        <h1 class="text-center font-weight-bold">Login</h1>
        <form method="post" class="w-75 m-auto">

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" class="form-control">
                <b>
                    <?php if (isset($error))
                        echo $error . "<br>"; ?>
                </b>
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
            </div>

            <button type="submit" class="btn btn-danger p-1 m-0">Login</button>
            <a href="password-reset.html" class="ml-3 text-danger">Forget Password?</a>
        </form>
    </div>
</section>
<!-- Login End -->