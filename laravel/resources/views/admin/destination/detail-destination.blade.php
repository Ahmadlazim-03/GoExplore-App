@extends('admin/index')
@section('content')
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
            <div class="card-body">
                        <h4 class="card-title">Detail Destination Table</h4>
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID Detail Destination</th>
                                    <th>ID Destination</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Video</th>
                                    <th>Rating</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $DataDetailDestination as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->destinations_id }}</td>
                                        <td> {{ $value->image  }} </td>
                                        <td> {{ $value->description }} </td>
                                        <td> {{ $value->video }} </td>
                                        <td> {{ $value->rating }} </td>
                                        <td> <a href="/delete-detail-destination/{{ $value->id }}">Delete</a> </td>
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
                <h4 class="card-title">Tambah Detail Destination</h4>
                <p class="card-description"> Form tambah Detail Destination </p>
                <form action="/create-detail-destination" method="POST" class="forms-sample" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">ID Destination</label>
                        <div class="col-sm-9">
                            <select class="form-select" name="id_destination" id="exampleSelectGender">
                                @foreach( $DataDestination as $value )
                                    <option value="{{ $value->idDestination }}">{{ $value->idDestination }} - {{ $value->Name_Destination }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Image</label>
                        <div class="col-sm-9">
                        <input type="file" id="exampleInputPassword2" name="image[]" accept="image/*" multiple required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputMobile" name="description" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Video</label>
                        <div class="col-sm-9">
                        <input type="file" id="exampleInputPassword2" name="video"accept="video/*"  required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Rating</label>
                        <div class="col-sm-9">
                        <input type="number"  min="0" max="5" class="form-control" id="exampleInputUsername2" name="rating" >
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
                <h4 class="card-title">Edit Detail Destination</h4>
                <p class="card-description"> Form edit Detail Destination </p>
                <form action="/edit-detail-destination" method="POST" class="forms-sample" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">ID Detail Destination</label>
                        <div class="col-sm-9">
                            <select class="form-select" name="id_detail_destination" id="exampleSelectGender">
                                @foreach( $DataDetailDestination as $value )
                                    <option value="{{ $value->id }}">{{ $value->id }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">ID Destination</label>
                        <div class="col-sm-9">
                            <select class="form-select" name="id_destination" id="exampleSelectGender">
                                @foreach( $DataDestination as $value )
                                    <option value="{{ $value->idDestination }}">{{ $value->idDestination }} - {{ $value->Name_Destination }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Image</label>
                        <div class="col-sm-9">
                        <input type="file" id="exampleInputPassword2" name="image[]" accept="image/*" multiple required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputMobile" name="description" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Video</label>
                        <div class="col-sm-9">
                        <input type="file" id="exampleInputPassword2" name="video"accept="video/*">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Rating</label>
                        <div class="col-sm-9">
                        <input type="number"  min="0" max="5" class="form-control" id="exampleInputUsername2" name="rating" >
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