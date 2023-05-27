<?php
use App\Core\Request;
use App\Models\Patient;
use App\Models\PatientRequest;

$conect = new DbSql();
if (!$conect) {
    echo mysqli_connect_error();
    exit;
}
$arr_error = [];
if (Request::get('arr', method:'get')) {
    $arr_error = explode(",", Request::get('arr', method:'get'));
}
$donor_requests= $conect->get('donor_requests');
include 'layouts/components/header-parts/nav.php';
include 'layouts/components/header-parts/header.php';
include 'layouts/components/header-parts/header2.php';
?>
<?php if (in_array('date',$arr_error)): ?>
    <div class='alert alert-danger alert-dismissible text-center' style="position: fixed; bottom: 5px; right: 5px; z-index: 99999">
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <strong>
            <?= "the date required";?>
        </strong>
    </div>
<?php endif; ?>
<?php if (in_array('hospital',$arr_error)): ?>
    <div class='alert alert-danger alert-dismissible text-center' style="position: fixed; bottom: 5px; right: 5px; z-index: 99999">
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <strong>
            <?= "the name of hospital required";?>
        </strong>
    </div>
<?php endif; ?>
    <div class="row justify-content-around mt-5 mb-5" id="reqs">
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <h3 class="card-title ml-3 font-weight-bold">Donner Request</h4>
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
                                    $id=$donor_request['id'];
                                    echo "<td>$i</td>"
                                        ?>
                                    <?php
                                    if ($donor_request['status'] == 'pending') {
                                        $blood = $donor_request['blood_type'];
                                        ?>
                                        <td>
                                            <?php echo $blood ?>
                                        </td>
                                        <td>--</td>
                                        <td>--</td>
                                        <td>
                                        <a href="#" title="accept"  type="button" data-toggle="modal"
                                            data-target="#exampleModal"><i
                                                class="fa fa-check text-success mr-3"></i></a>
                                        <a href='cancel?id=<?= $id ?>' title="reject" onclick="return confirm('Are you sure you want to reject this request?')"><i class="fa fa-times text-danger"></i></a>
                                    </td>
                                </tr>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($donor_request['status'] == 'rejected') {
                                        $blood = $donor_request['blood_type'];
                                        ?>
                                        <td>
                                            <?php echo $blood ?>
                                        </td>
                                        <td>--</td>
                                        <td>--</td>
                                        <td><span class="badge badge-danger">rejected</span></td>
                                </tr>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($donor_request['status'] == 'accepted') {
                                        $blood = $donor_request['blood_type'];
                                        $date = $donor_request['date'];
                                        $hospital = $donor_request['hospital'];
                                        ?>
                                        <td>
                                            <?php echo $blood ?>
                                        </td>
                                        <td><?php echo $date ?></td>
                                        <td><?php echo $hospital ?></td>
                                        <td><span class="badge badge-success">accepted</span></td>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Accept Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="approve?id=<?= $id?>" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Date</label>
                            <input type="date" name="date" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hospital</label>
                            <input type="text" name="hospital" class="form-control" id="exampleInputPassword1">
                        </div>
                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
