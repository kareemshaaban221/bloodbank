<?php
use App\Core\Request;
use App\Models\Patient;
use App\Models\PatientRequest;

$conect = new DbSql();
if (!$conect) {
    echo mysqli_connect_error();
    exit;
}

include 'layouts/components/header-parts/nav.php';
include 'layouts/components/header-parts/header.php';
include 'layouts/components/header-parts/header2.php';
?>
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
                                <tr>
                                    <td>1</td>
                                    <td>B+</td>
                                    <td>12 May 2017</td>
                                    <td>Rabea Hospital</td>
                                    <td><span class="badge badge-success">accepted</span></td>
                                </tr>
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
                                    <td>
                                        <a href='#' title="accept" type="button" data-toggle="modal"
                                            data-target="#exampleModal"><i
                                                class="fa fa-check text-success mr-3"></i></a>
                                        <a href='#' title="reject" onclick="return confirm('Are you sure you want to reject this request?')"><i class="fa fa-times text-danger"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>A+</td>
                                    <td>16 May 2017</td>
                                    <td>Rabea Hospital</td>
                                    <td><span class="badge badge-success">accepted</span></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>A+</td>
                                    <td>20 May 2017</td>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Accept Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        
                            <div class="form-group">
                                <label for="exampleInputEmail1">Date</label>
                                <input type="date" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hospital</label>
                                <input type="text" class="form-control" id="exampleInputPassword1">
                            </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>