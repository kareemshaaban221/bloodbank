<?php
    include 'layouts/components/header-parts/nav.php';
    include 'layouts/components/header-parts/header.php';
    include 'layouts/components/header-parts/header2.php';
?>

<!-- * for visitor about patients requests -->
<div class="row justify-content-around mt-5 mb-5" id="reqs">
    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between">
                    <h3 class="card-title ml-3 font-weight-bold">Blood types matching</h3>
                </div>
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th class="align-middle" rowspan="2">Receipient</th>
                                <th colspan="8">Donor</th>
                                <!-- <th>Blood Type</th>
                                <th>Date</th>
                                <th>Hospital</th> -->
                            </tr>
                            <tr>
                                <th>O-</th>
                                <th>O+</th>
                                <th>A-</th>
                                <th>A+</th>
                                <th>B-</th>
                                <th>B+</th>
                                <th>AB-</th>
                                <th>AB+</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>O-</th>
                                <td class="text-success"><i class="fa fa-check"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                            </tr>
                            <tr>
                                <th>O+</th>
                                <td class="text-success"><i class="fa fa-check"></i></td>
                                <td class="text-success"><i class="fa fa-check"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                            </tr>
                            <tr>
                                <th>A-</th>
                                <td class="text-success"><i class="fa fa-check"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                                <td class="text-success"><i class="fa fa-check"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                            </tr>
                            <tr>
                                <th>A+</th>
                                <td class="text-success"><i class="fa fa-check"></i></td>
                                <td class="text-success"><i class="fa fa-check"></i></td>
                                <td class="text-success"><i class="fa fa-check"></i></td>
                                <td class="text-success"><i class="fa fa-check"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                            </tr>
                            <tr>
                                <th>B-</th>
                                <td class="text-success"><i class="fa fa-check"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                                <td class="text-success"><i class="fa fa-check"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                            </tr>
                            <tr>
                                <th>B+</th>
                                <td class="text-success"><i class="fa fa-check"></i></td>
                                <td class="text-success"><i class="fa fa-check"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                                <td class="text-success"><i class="fa fa-check"></i></td>
                                <td class="text-success"><i class="fa fa-check"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                            </tr>
                            <tr>
                                <th>AB-</th>
                                <td class="text-success"><i class="fa fa-check"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                                <td class="text-success"><i class="fa fa-check"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                                <td class="text-success"><i class="fa fa-check"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                                <td class="text-success"><i class="fa fa-check"></i></td>
                                <td class="text-danger"><i class="fa fa-times"></i></td>
                            </tr>
                            <tr>
                                <th>AB+</th>
                                <td class="text-success"><i class="fa fa-check"></i></td>
                                <td class="text-success"><i class="fa fa-check"></i></td>
                                <td class="text-success"><i class="fa fa-check"></i></td>
                                <td class="text-success"><i class="fa fa-check"></i></td>
                                <td class="text-success"><i class="fa fa-check"></i></td>
                                <td class="text-success"><i class="fa fa-check"></i></td>
                                <td class="text-success"><i class="fa fa-check"></i></td>
                                <td class="text-success"><i class="fa fa-check"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- * for visitor about donors blood types -->
<div class="row justify-content-around mt-5 mb-5" id="bloodtypes">
    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between">
                    <h3 class="card-title ml-3 font-weight-bold">Donors</h3>
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
                                <th>Donor</th>
                                <th>Blood Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Jacob</td>
                                <td>B+</td>
                            </tr>
                            <tr>
                                <td>Messsy</td>
                                <td>O-</td>
                            </tr>
                            <tr>
                                <td>John</td>
                                <td>A+</td>
                            </tr>
                            <tr>
                                <td>Peter</td>
                                <td>A+</td>
                            </tr>
                            <tr>
                                <td>Dave</td>
                                <td>A+</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>