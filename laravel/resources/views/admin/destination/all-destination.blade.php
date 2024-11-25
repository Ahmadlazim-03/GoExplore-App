@extends('admin/index')
@section('content')
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
            <div class="card-body">
                        <h4 class="card-title">All Destination Table</h4>
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name Destination</th>
                                    <th>Location</th>
                                    <th>Description</th>
                                    <th>Price Perticket</th>
                                    <th>Availabe Ticket</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Opening Hours</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $DataDestination as $value)
                                    <tr>
                                        <td>{{ $value->idDestination }}</td>
                                        <td>{{ $value->Name_Destination }}</td>
                                        <td> {{ $value->Location  }} </td>
                                        <td> {{ $value->Description }} </td>
                                        <td> {{ $value->Price_perticket }} </td>
                                        <td> {{ $value->Available_seat }} </td>
                                        <td>{{ $value->Image }}</td>
                                        <td> {{ $value->Category }} </td>
                                        <td> {{ $value->Opening_hours }}</td>
                                        <td>{{ $value->tgl }}</td>
                                        <td> <a href="/delete-destination/{{ $value->idDestination }}">Delete</a> </td>
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
                <h4 class="card-title">Tambah Destination</h4>
                <p class="card-description"> Form tambah destination </p>
                <form action="/create-destination" method="POST" class="forms-sample" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name Destination</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2" name="Name_Destination"  required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Location</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputEmail2" name="Locations" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputMobile" name="Description" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Image</label>
                        <div class="col-sm-9">
                        <input type="file"  id="exampleInputPassword2" name="Image" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Price</label>
                        <div class="col-sm-9">
                        <input type="number"  min="0" class="form-control" id="exampleInputUsername2" name="Price_perticket" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Availabe Seat</label>
                        <div class="col-sm-9">
                        <input type="number"  min="0"class="form-control" id="exampleInputUsername2" name="Available_seat" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Category</label>
                        <div class="col-sm-9">
                            <select class="form-select" name="Category" id="exampleSelectGender">
                                <option value="Wisata Sejarah dan Budaya">Wisata Sejarah dan Budaya</option>
                                <option value="Wisata Alam dan Taman">Wisata Alam dan Taman</option>
                                <option value="Wisata Modern dan Hiburan">Wisata Modern dan Hiburan</option>
                                <option value="Wisata Religi">Wisata Religi</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Opening Hours</label>
                        <div class="col-sm-9">
                        <input type="time" class="form-control" id="exampleInputUsername2" name="Opening_hours" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Date</label>
                        <div class="col-sm-9">
                        <input type="date" class="form-control" id="exampleInputUsername2" name="tgl">
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
                <h4 class="card-title">Edit Destination</h4>
                <p class="card-description"> Form edit destination </p>
                <form action="/edit-destination" method="POST" class="forms-sample" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">ID Destination</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2" name="idDestination"  required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name Destination</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2" name="Name_Destination"  required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Location</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputEmail2" name="Locations" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputMobile" name="Description" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Image</label>
                        <div class="col-sm-9">
                        <input type="file"  id="exampleInputPassword2" name="Image" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Price</label>
                        <div class="col-sm-9">
                        <input type="number"  min="0" class="form-control" id="exampleInputUsername2" name="Price_perticket" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Availabe Seat</label>
                        <div class="col-sm-9">
                        <input type="number"  min="0"  class="form-control" id="exampleInputUsername2" name="Available_seat" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Category</label>
                        <div class="col-sm-9">
                            <select class="form-select" name="Category" id="exampleSelectGender">
                                <option value="Wisata Sejarah dan Budaya">Wisata Sejarah dan Budaya</option>
                                <option value="Wisata Alam dan Taman">Wisata Alam dan Taman</option>
                                <option value="Wisata Modern dan Hiburan">Wisata Modern dan Hiburan</option>
                                <option value="Wisata Religi">Wisata Religi</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Opening Hours</label>
                        <div class="col-sm-9">
                        <input type="time" class="form-control" id="exampleInputUsername2" name="Opening_hours" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Date</label>
                        <div class="col-sm-9">
                        <input type="date" class="form-control" id="exampleInputUsername2" name="tgl">
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