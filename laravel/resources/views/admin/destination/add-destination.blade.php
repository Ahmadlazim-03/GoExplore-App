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
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection