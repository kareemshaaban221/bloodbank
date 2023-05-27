<?php

$conect = new DbSql();
if (!$conect) {
    echo mysqli_connect_error();
    exit;
}
$donor_requests1 = $conect->get('donor_requests');

include 'layouts/components/header-parts/nav.php';
include 'layouts/components/header-parts/header.php';
include 'layouts/components/header-parts/header2.php';
?>

<div class="row justify-content-around mt-5 mb-5" id="reqs">
    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between">
                    <h3 class="card-title ml-3 font-weight-bold">My Donations</h4>
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
                            while ($donor_requests = mysqli_fetch_assoc($donor_requests1)) { ?>
                                <tr>
                                    <?php
                                    ++$i;
                                    echo "<td>$i</td>"
                                        ?>
                                    <?php
                                    if ($donor_requests['status'] == 'pending' || $donor_requests['status'] == 'rejected') {
                                        $blood = $donor_requests['blood_type'];
                                        ?>
                                        <td>
                                            <?php echo $blood ?>
                                        </td>
                                        <td>--</td>
                                        <td>--</td>
                                        <td><span class="badge badge-warning">pending</span></td>
                                    </tr>
                                <?php
                                    }
                                    ?>
                            <?php } ?>
                            <tr>
                                <td>2</td>
                                <td>O-</td>
                                <td>--</td>
                                <td>--</td>
                                <td><span class="badge badge-danger">rejected</span></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>A+</td>
                                <td>--</td>
                                <td>--</td>
                                <td><span class="badge badge-warning">pending</span></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>A+</td>
                                <td>16 May 2017</td>
                                <td>Rabea Hospital</td>
                                <td><span class="badge badge-success">accepted</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>