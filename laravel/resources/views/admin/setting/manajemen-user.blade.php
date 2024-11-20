@extends('admin/index')
@section('content')
    <div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">User Table</h4>
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Profile_picture</th>
                                    <th>Email</th>
                                    <th>Full_name</th>
                                    <th>Address</th>
                                    <th>Date_of_birth</th>
                                    <th>Gender</th>
                                    <th>Nationality</th>
                                    <th>Contact_info</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $DataUser as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>
                                        <img src="{{ asset('img/' . $value->profile_picture) }}" alt="image" />
                                        </td>
                                        <td> {{ $value->email }} </td>
                                        <td> {{ $value->full_name ?? "-" }} </td>
                                        <td> {{ $value->address ?? "-" }} </td>
                                        <td> {{ $value->date_of_birth ?? "-" }} </td>
                                        <td> {{ $value->gender }} </td>
                                        <td> {{ $value->nationality ?? "-" }} </td>
                                        <td> {{ $value->contact_info ?? "-" }} </td>
                                        <td> {{ $value->role }}</td>
                                        <td>
                                            @if( $value->status == "active" )
                                                <div class="badge badge-outline-success">Active</div>
                                            @else
                                                <div class="badge badge-outline-danger">Inactive</div>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/manajemen-user-delete/{{ $value->id }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
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
                        <h4 class="card-title">Tambah User</h4>
                        <p class="card-description"> Form tambah user </p>
                        <form action="/manajemen-user-create" method="POST" class="forms-sample" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputUsername2" name="name" placeholder="Name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                <input type="email" class="form-control" id="exampleInputEmail2" name="email" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputMobile" name="password" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Profile Picture</label>
                                <div class="col-sm-9">
                                <input type="file"  id="exampleInputPassword2" name="profile_picture" placeholder="Profile Picture" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Full Name</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputUsername2" name="full_name" placeholder="Full Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputUsername2" name="address" placeholder="Address">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Date of Birth</label>
                                <div class="col-sm-9">
                                <input type="date" class="form-control" id="exampleInputUsername2" name="date_of_birth" placeholder="Date of Birth">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Gender</label>
                                <div class="col-sm-9">
                                    <select class="form-select" name="gender" id="exampleSelectGender" required>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nationality</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputUsername2" name="nationality" placeholder="Nationality">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Contact Info</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputUsername2" name="contact_info" placeholder="Contact Info">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Role</label>
                                <div class="col-sm-9">
                                    <select class="form-select" name="role" id="exampleSelectGender" required>
                                        @foreach( $DataRole as $data )
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                           
                            <div class="form-check form-check-flat form-check-primary">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" required> Remember me </label>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button class="btn btn-dark">Cancel</button>
                        </form>
                    </div>
                    </div>
        </div>

        <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit User</h4>
                        <p class="card-description"> Form edit user </p>
                        <form action="/manajemen-user-edit" method="POST" class="forms-sample" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Select ID User</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputUsername2" name="ID" placeholder="ID User" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputUsername2" name="name" placeholder="Name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                <input type="email" class="form-control" id="exampleInputEmail2" name="email" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputMobile" name="password" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Profile Picture</label>
                                <div class="col-sm-9">
                                <input type="file"  id="exampleInputPassword2" name="profile_picture" placeholder="Profile Picture" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Full Name</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputUsername2" name="full_name" placeholder="Full Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputUsername2" name="address" placeholder="Address">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Date of Birth</label>
                                <div class="col-sm-9">
                                <input type="date" class="form-control" id="exampleInputUsername2" name="date_of_birth" placeholder="Date of Birth">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Gender</label>
                                <div class="col-sm-9">
                                    <select class="form-select" name="gender" id="exampleSelectGender" required>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nationality</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputUsername2" name="nationality" placeholder="Nationality">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Contact Info</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputUsername2" name="contact_info" placeholder="Contact Info">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Role</label>
                                <div class="col-sm-9">
                                    <select class="form-select" name="role" id="exampleSelectGender" required>
                                        @foreach( $DataRole as $data )
                                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                           
                            <div class="form-check form-check-flat form-check-primary">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" required> Remember me </label>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button class="btn btn-dark">Cancel</button>
                        </form>
                    </div>
                    </div>
        </div>
    </div>
@endsection