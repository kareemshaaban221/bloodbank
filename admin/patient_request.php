<?php
use App\Core\Request;
use App\Models\Patient;
use App\Models\PatientRequest;

$conect = new DbSql();
if (!$conect) {
    echo mysqli_connect_error();
    exit;
}
$patient_requests= $conect->get('patient_requests');
include 'layouts/components/header-parts/nav.php';
include 'layouts/components/header-parts/header.php';
include 'layouts/components/header-parts/header2.php';
?>
    <div class="row justify-content-around mt-5">
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <h3 class="card-title ml-3 font-weight-bold">Patient Requests</h4>
  <select onchange="filter(this)" class="mb-2 mr-3">
                            <option value="">--</option>
                            <option value="">A-</option>
                            <option value="">A+</option>
                            <option value="">B-</option>
                            <option value="">B+</option>
                            <option value="">AB-</option>
                            <option value="">AB+</option>
                            <option value="">O-</option>
                            <option value="">O+</option>
                        </select>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Blood Type</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            while ($patient_request= mysqli_fetch_assoc($patient_requests)):
                                $id=$patient_request['patient_id'];
                                $patient=$conect->get('patients',"id='$id'");
                                $patient=mysqli_fetch_assoc($patient);
                                ?>
                                <tr>
                                    <td> <?= $patient['name'] ?> </td>
                                    <td> <?= $patient_request['blood_type'] ?> </td>
                                    <td> <?= $patient['email'] ?> </td>
                                </tr>
                            <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>