@extends('admin/index')
@section('content')
<div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Menu Tabel</h4>
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>
                                <div class="form-check form-check-muted m-0">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="check-all">
                                    </label>
                                </div>
                                </th>
                                <th> Client Name </th>
                                <th> Order No </th>
                                <th> Product Cost </th>
                                <th> Project </th>
                                <th> Payment Mode </th>
                                <th> Start Date </th>
                                <th> Payment Status </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                <div class="form-check form-check-muted m-0">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">
                                    </label>
                                </div>
                                </td>
                                <td>
                                <img src="admin/assets/images/faces/face1.jpg" alt="image" />
                                <span class="ps-2">Henry Klein</span>
                                </td>
                                <td> 02312 </td>
                                <td> $14,500 </td>
                                <td> Dashboard </td>
                                <td> Credit card </td>
                                <td> 04 Dec 2019 </td>
                                <td>
                                <div class="badge badge-outline-success">Approved</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <div class="form-check form-check-muted m-0">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">
                                    </label>
                                </div>
                                </td>
                                <td>
                                <img src="admin/assets/images/faces/face2.jpg" alt="image" />
                                <span class="ps-2">Estella Bryan</span>
                                </td>
                                <td> 02312 </td>
                                <td> $14,500 </td>
                                <td> Website </td>
                                <td> Cash on delivered </td>
                                <td> 04 Dec 2019 </td>
                                <td>
                                <div class="badge badge-outline-warning">Pending</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <div class="form-check form-check-muted m-0">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">
                                    </label>
                                </div>
                                </td>
                                <td>
                                <img src="admin/assets/images/faces/face5.jpg" alt="image" />
                                <span class="ps-2">Lucy Abbott</span>
                                </td>
                                <td> 02312 </td>
                                <td> $14,500 </td>
                                <td> App design </td>
                                <td> Credit card </td>
                                <td> 04 Dec 2019 </td>
                                <td>
                                <div class="badge badge-outline-danger">Rejected</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <div class="form-check form-check-muted m-0">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">
                                    </label>
                                </div>
                                </td>
                                <td>
                                <img src="admin/assets/images/faces/face3.jpg" alt="image" />
                                <span class="ps-2">Peter Gill</span>
                                </td>
                                <td> 02312 </td>
                                <td> $14,500 </td>
                                <td> Development </td>
                                <td> Online Payment </td>
                                <td> 04 Dec 2019 </td>
                                <td>
                                <div class="badge badge-outline-success">Approved</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <div class="form-check form-check-muted m-0">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">
                                    </label>
                                </div>
                                </td>
                                <td>
                                <img src="admin/assets/images/faces/face4.jpg" alt="image" />
                                <span class="ps-2">Sallie Reyes</span>
                                </td>
                                <td> 02312 </td>
                                <td> $14,500 </td>
                                <td> Website </td>
                                <td> Credit card </td>
                                <td> 04 Dec 2019 </td>
                                <td>
                                <div class="badge badge-outline-success">Approved</div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                    </div>
                </div>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Horizontal Form</h4>
                        <p class="card-description"> Horizontal form layout </p>
                        <form class="forms-sample">
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputMobile" placeholder="Mobile number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Re Password</label>
                            <div class="col-sm-9">
                            <input type="password" class="form-control" id="exampleInputConfirmPassword2" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-check form-check-flat form-check-primary">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input"> Remember me </label>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-dark">Cancel</button>
                        </form>
                    </div>
                    </div>
        </div>
    </div>
@endsection