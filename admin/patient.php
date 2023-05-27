<?php
use App\Core\Request;
use App\Models\Patient;
use App\Models\PatientRequest;

$conect = new DbSql();
if (!$conect) {
    echo mysqli_connect_error();
    exit;
}
$patients= $conect->get('patients');

include 'layouts/components/header-parts/nav.php';
include 'layouts/components/header-parts/header.php';
include 'layouts/components/header-parts/header2.php';
?>
     <div class="row justify-content-around mt-5">
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <h3 class="card-title ml-3 font-weight-bold">Patient Table</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Blood_type</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            while ($patient= mysqli_fetch_assoc($patients)):
                                ?>
                                <tr>
                                    <td> <?= $patient['name'] ?> </td>
                                    <td> <?= $patient['blood_type'] ?> </td>
                                    <td> <?= $patient['email'] ?> </td>
                                    <td> <?= $patient['address'] ?> </td>
                                    <td> <?= $patient['phone'] ?> </td>
                                </tr>
                            <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>