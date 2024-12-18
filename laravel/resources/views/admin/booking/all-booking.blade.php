@extends('admin/index')
@section('content')
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
            <div class="card-body">
                        <h4 class="card-title">Information Bookings</h4>
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID Booking</th>
                                    <th>ID User</th>
                                    <th>ID Destination</th>
                                    <th>Ticket Code</th>
                                    <th>Start Date</th>
                                    <th>Finish Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( DB::table('e_tickets')->paginate(10) as $value)
                                    <tr>
                                        <td>{{ $value->ticket_id }}</td>
                                        <td>
                                            @foreach ( DB::table('users')->get() as $item)
                                                @if($item->id == $value->users_id)
                                                    {{ $item->name  }} 
                                                @endif
                                            @endforeach 
                                        </td>
                                        <td> 
                                            @foreach ( DB::table('destinations')->get() as $item)
                                                @if($item->idDestination == $value->destination_id)
                                                    {{ $item->Name_Destination  }} 
                                                @endif
                                            @endforeach
                                        </td>
                                        <td> {{ $value->ticket_code }} </td>
                                        <td> {{ $value->issue_date }} </td>
                                        <td> {{ $value->valid_until }} </td>
                                        <td>{{ $value->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
                
            </div>
            <span style="margin-left:25px;">{{ DB::table('e_tickets')->paginate(10)->links('pagination::bootstrap-4') }}</span>
            </div>
        </div>
    </div>


    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
            <div class="card-body">
                        <h4 class="card-title">Information Cancel Bookings</h4>
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID Cancel Bookings</th>
                                    <th>ID User</th>
                                    <th>ID Bookings</th>
                                    <th>Alasan</th>
                                    <th>Time Cancel</th>                                 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( DB::table('cancel_bookings')->paginate(10) as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->id_user }}</td>
                                        <td> {{ $value->id_ticket  }} </td>
                                        <td> {{ $value->alasan }} </td>
                                        <td> {{ $value->created_at }} </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
            <span style="margin-left:25px;">{{ DB::table('cancel_bookings')->paginate(10)->links('pagination::bootstrap-4') }}</span></span>
            </div>
        </div>
    </div>

@endsection