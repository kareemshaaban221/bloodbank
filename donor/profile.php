<?php 
use App\Core\Auth;
use App\Core\Request;
$conect = new DbSql();
if (!$conect) {
    echo mysqli_connect_error();
    exit;
}
$id = Auth::user()->id;
$donor=$conect->get('donors',"id=$id");
$donor=mysqli_fetch_assoc($donor);
// dd($patient);
include 'layouts/components/header-parts/nav.php';
include 'layouts/components/header-parts/header2.php';
?>
   <section id="login" class="mt-3">
        <div class="container">
            <h1 class="text-center font-weight-bold">Profile</h1>
            <img src="../imgs/prof
use App\Core\Request;ile.png" alt="">
            <div class="table-responsive">
                <table class="table w-50 m-auto">
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td><?=$donor['name']?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?=$donor['email']?></td>
                        </tr>
                        <tr>
                            <td>Blood type</td>
                            <td><?=$donor['blood_type']?>+</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><?=$donor['address']?>+</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td><?=$donor['phone']?>+</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center"><a href="profile-edit.html">edit profile</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center"><a href="">upload profile image</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>