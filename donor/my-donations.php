<?php

use App\Core\Auth;

$conect = new DbSql();
if (!$conect) {
    echo mysqli_connect_error();
    exit;
}
$donor_requests = $conect->get('donor_requests', 'id = ' . Auth::user()->id);

include 'layouts/components/header-parts/nav.php';
include 'layouts/components/header-parts/header.php';
include 'layouts/components/header-parts/header2.php';
?>

<div class="row justify-content-around mt-5 mb-5" id="reqs">
    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between">
                    <h3 class="card-title ml-3 font-weight-bold">My Donations</h3>
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
                                <th>#</th>
                                <th>Blood Type</th>
                                <td>Date</td>
                                <td>Hospital</td>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            while ($donor_request = mysqli_fetch_assoc($donor_requests)) { ?>
                                <tr>
                                    <?php
                                    ++$i;
                                    echo "<td>$i</td>"
                                        ?>
                                    <?php
                                    if ($donor_request['status'] == 'accepted') {
                                        $blood = $donor_request['blood_type'];
                                        $date = $donor_request['date'];
                                        $hospital = $donor_request['hospital'];
                                        ?>
                                        <td>
                                            <?= $blood ?>
                                        </td>
                                        <td><?= date("F jS, Y", strtotime($date)); ?></td>
                                        <td><?= $hospital ?></td>
                                        <td><span class="badge badge-success">accepted</span></td>
                                </tr>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($donor_request['status'] == 'pending') {
                                        $blood = $donor_request['blood_type'];
                                        ?>
                                        <td>
                                            <?= $blood ?>
                                        </td>
                                        <td>--</td>
                                        <td>--</td>
                                        <td><span class="badge badge-warning">pending</span></td>
                                </tr>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($donor_request['status'] == 'rejected') {
                                        $blood = $donor_request['blood_type'];
                                        ?>
                                        <td>
                                            <?= $blood ?>
                                        </td>
                                        <td>--</td>
                                        <td>--</td>
                                        <td><span class="badge badge-danger">rejected</span></td>
                                </tr>
                                    <?php
                                    }
                                    ?>
                            <?php 
                            } 
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>