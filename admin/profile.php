<?php 
use App\Core\Auth;
use App\Core\Request;
$conect = new DbSql();
if (!$conect) {
    echo mysqli_connect_error();
    exit;
}
$id = Auth::user()->id;
$admin=$conect->get('admins',"id=$id");
$admin=mysqli_fetch_assoc($admin);
// dd($patient);
include 'layouts/components/header-parts/nav.php';
include 'layouts/components/header-parts/header2.php';
?>
   <section id="login" class="mt-3">
        <div class="container">
            <h1 class="text-center font-weight-bold">Profile</h1>
            <img src="../imgs/profile.png" alt="">
            <div class="table-responsive">
                <table class="table w-50 m-auto">
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td><?=$admin['name']?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?=$admin['email']?></td>
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