@extends('admin/index')
@section('content')
<div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Role Tabel</h4>
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th> ID </th>
                                <th> Role </th>
                                <th> </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach( $DataRole as $value)
                                <tr>
                                    <td> {{ $value->id }} </td>
                                    <td> {{ $value->name}} </td>
                                    <td> <a href="/manajemen-role-delete/{{ $value->id }}">Delete</a> </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                    </div>
                </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Role</h4>
                        <p class="card-description"> Form tambah role </p>
                        <form action="/manajemen-role-create" method="POST" class="forms-sample">
                            @csrf
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name Role</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputUsername2" name="role" placeholder="Role" required>
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
                        <h4 class="card-title">Edit Role</h4>
                        <p class="card-description"> Form edit role </p>
                        <form action="/manajemen-role-edit" method="POST" class="forms-sample" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Select ID Role</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputUsername2" name="ID" placeholder="ID User" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name Role</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputUsername2" name="role" placeholder="Name Role" required>
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