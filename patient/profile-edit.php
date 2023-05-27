<?php
use App\Core\Auth;
use App\Core\Request;

$patient = Auth::user();

if (Request::method() == 'post') {
    // ****************** VALIDATION *******************//
    $arr = [];
    if (!(Request::get('name')) || empty(Request::get('name'))) {
        $arr[] = 'name';
    }
    if (!(Request::get('address')) || empty(Request::get('address'))) {
        $arr[] = 'address';
    }
    if (!(Request::get('phone')) || empty(Request::get('phone'))) {
        $arr[] = 'phone';
    }
    
    if ($arr) {
        header("location:profile_edit?arr=" . implode(",", $arr));
        exit;
    }

    // ****************** SETUP DB CONNECTION *********************//
    $conect = new DbSql();
    if (!$conect) {
        echo mysqli_connect_error();
    }

    $name = $conect->escapeString(Request::get('name'));
    $address = $conect->escapeString(Request::get('address'));
    $phone = $conect->escapeString(Request::get('phone'));

    $query = "name = '$name', address = '$address', phone = '$phone'";
    if(!$conect->update('patients', $query, "id = '{$patient->id}'")) {
        throw new \Exception('Error while updating password!');
    }

    // **** UPDATING CURRENT AUTH DATA **** //
    $patient->name = $name;
    $patient->address = $address;
    $patient->phone = $phone;
    Auth::login($patient);

    $message = 'Profile has been updated successfully!';
    header("location:profile?message={$message}");
    exit;
}

$arr_error = [];
if (Request::get('arr', method:'get')) {
    $arr_error = explode(",", Request::get('arr', method:'get'));
}

include 'layouts/components/header-parts/nav.php';
?>

<section id="login" class="mt-3">
    <div class="container">
        <h1 class="text-center font-weight-bold">Profile</h1>
        <form action="profile_edit" method="post" class="w-75 m-auto">
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" name="name" type="text" class="form-control"
                    value="<?= $patient->name ?>">
                <span class="text-danger">
                    <?php if (in_array('name', $arr_error)) {
                        echo "* enter your name";
                    } ?>
                </span>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input disabled id="email" name="email" type="email" class="form-control"
                    value="<?= $patient->email ?>">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input id="address" name="address" type="text" class="form-control"
                    value="<?= $patient->address ?>">
                <span class="text-danger">
                    <?php if (in_array('address', $arr_error)) {
                        echo "* enter your address";
                    } ?>
                </span>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input id="phone" name="phone" type="text" class="form-control"
                    value="<?= $patient->phone ?>">
                <span class="text-danger">
                    <?php if (in_array('phone', $arr_error)) {
                        echo "* enter your phone";
                    } ?>
                </span>
            </div>

            <button type="submit" class="btn btn-danger p-1 m-0">Update</button>
        </form>
    </div>
</section>
<!-- Login End -->