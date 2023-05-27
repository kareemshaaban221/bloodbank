<?php
use App\Core\Auth;
use App\Core\Request;

$conect = new DbSql();
if (!$conect) {
    echo mysqli_connect_error();
    exit;
}
$id = Auth::user()->id;
$donor = $conect->get('donors', "id=$id");
$donor = mysqli_fetch_assoc($donor);
// dd($patient);
include 'layouts/components/header-parts/nav.php';
include 'layouts/components/header-parts/header2.php';
include 'layouts/components/messages/success.php';
include 'layouts/components/messages/error.php';
?>
<section id="login" class="mt-3">
    <div class="container">
        <h1 class="text-center font-weight-bold">Profile <a href="profile_edit"><i class='fa fa-edit fa-xs'></i></a>
        </h1>
        <div class="table-responsive">
            <table class="table w-50 m-auto text-center">
                <tbody>
                    <tr>
                        <td class='border-right'>Name</td>
                        <td>
                            <?= $donor['name'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td class='border-right'>Email</td>
                        <td>
                            <?= $donor['email'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td class='border-right'>Blood type</td>
                        <td>
                            <?= $donor['blood_type'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td class='border-right'>Address</td>
                        <td>
                            <?= $donor['address'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td class='border-right'>Phone</td>
                        <td>
                            <?= $donor['phone'] ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>