<?php

use App\Core\Request;
use App\Core\Session;

if (!Session::get('form.type')) {
    $error = 'error while submitting, try again';
    header("location:password_reset_email?error={$error}");
    exit;
}

if (Request::method() == 'post') {
    // ******************* VALIDATION *********************//
    $arr = [];
    if(!Request::get('password') || empty(Request::get('password'))){
        $arr[]='password';
    }
    if(!Request::get('password_confirmation') || empty(Request::get('password_confirmation'))){
        $arr[]='password_confirmation';
    }
    if(Request::get('password') != Request::get('password_confirmation')){
        $arr[]='password_not_equal';
    }

    if ($arr) {
        // * no clearing for session here...
        header("location:password_reset?arr=" . implode(",", $arr));
        exit;
    }

    // **************** SETUP DATABASE CONNECTION ****************//
    $conect = new DbSql();
    if (!$conect) {
        echo mysqli_connect_error();
    }

    $password = $conect->escapeString(Request::get('password'));
    $password = crypt($password, PASSWORD_DEFAULT);
    $user_type = Session::get('form.type');
    $email = Session::get('form.email');

    if ($user_type == 'patient') {

        if(!$conect->update('patients', "password = '$password'", "email = '$email'")) {
            throw new \Exception('Error while updating password!');
        }

    } else if ($user_type == 'donor') {

        if(!$conect->update('donors', "password = '$password'", "email = '$email'")) {
            throw new \Exception('Error while updating password!');
        }

    } else if ($user_type == 'admin') {

        if(!$conect->update('admins', "password = '$password'", "email = '$email'")) {
            throw new \Exception('Error while updating password!');
        }

    } else {
        Session::clear();
        $error = 'given an invalid user type, try again';
        header("location:password_reset_email?error={$error}");
        exit;
    }

    Session::clear();
    $message = 'Password has been updated successfully!';
    header("location:login?message={$message}");
    exit;
}

// ************** ERROR ****************//
$arr_error = [];
if (Request::get('arr', method:'get')) {
    $arr_error = explode(",", Request::get('arr', method:'get'));
}
    
include 'layouts/components/header-parts/nav.php';
include 'layouts/components/header-parts/header2.php';
?>

<!-- * for patient -->
<!-- Login Start -->
<section id="login" class="mt-3">
    <div class="container">
        <h1 class="text-center font-weight-bold">Reset Password</h1>
        <form action="password_reset" method="post" class="w-75 m-auto">
            
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" class="form-control">
                <span class="text-danger">
                    <?php if (in_array('password', $arr_error)) {
                        echo "* enter your password";
                    } ?>
                </span>
                <span class="text-danger">
                    <?php if (in_array('password_not_equal', $arr_error)) {
                        echo "* enter the same password";
                    } ?>
                </span>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control">
                <span class="text-danger">
                    <?php if (in_array('password_confirmation', $arr_error)) {
                        echo "enter your password confirmation";
                    } ?>
                </span>
                <span class="text-danger">
                    <?php if (in_array('password_not_equal', $arr_error)) {
                        echo "enter the same password";
                    } ?>
                </span>
            </div>

            <button type="submit" class="btn btn-danger p-1 m-0">Reset</button>
        </form>
    </div>
</section>
<!-- Login End -->