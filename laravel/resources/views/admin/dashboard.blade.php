@extends('admin/index')
@section('content')
<div class="row">
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{ DB::table('destinations')->count() }}</h3>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">All Destination</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{ DB::table('e_tickets')->where('status', 'Paid')->count() }}</h3>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">All Bookings</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{ DB::table('cancel_bookings')->count() }}</h3>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">All Cancel Bookings</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{ DB::table('users')->where('status',"active")->count() }}</h3>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">All User Online</h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Transaction History</h4>
                    <div class="position-relative">
                      <div class="daoughnutchart-wrapper">
                        <canvas id="transaction-history" class="transaction-chart"></canvas>
                      </div>
                      <div class="custom-value">{{ DB::table('destinations')->count() }}<span>Total Destination</span>
                      </div>
                    </div>
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Amount of Income</h6>
                        <p class="text-muted mb-0">
                          {{ \Carbon\Carbon::now()->format('d F Y') }}
                        </p>
                      </div>
                      <div class="align-self-center flex-grow text-end text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0"> Rp. {{ number_format(DB::table('orders')->sum('total_price'), 0, ',', '.') }}</h6>
                      </div>
                    </div>
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Cancel Transaction</h6>
                        <p class="text-muted mb-0">{{ \Carbon\Carbon::now()->format('d F Y') }}</p>
                      </div>
                      <div class="align-self-center flex-grow text-end text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0">{{ DB::table('e_tickets')->where('status','Unpaid')->count() }}</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                      <h4 class="card-title mb-1">Information Destination</h4>
                      <p class="text-muted mb-1">Detail Destination</p>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="preview-list">




                        @foreach( $DB_Destination as $item )

                          <div class="preview-item border-bottom">
                            <div class="preview-thumbnail">
                                <img src="{{ asset('img/'.$item->Image) }}" alt="">
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <h6 class="preview-subject">{{ $item->Name_Destination }}</h6>
                                <p class="text-muted mb-0">Available Seat : {{ $item->Available_seat }}</p>
                              </div>
                              <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted">Bookings : {{ DB::table('e_tickets')->where('destination_id', $item->idDestination)->where('status', 'Paid')->count() }}</p>
                              </div>
                            </div>
                          </div>

                        @endforeach




                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>





            </div>
          
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">User Online</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                           
                            <th> Name </th>
                            <th> Email </th>
                            <th> Address </th>
                            <th> Gender </th>
                            <th> Nationality </th>
                            <th> Contact Info </th>
                            <th> Status </th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach( $DB_User->where('status',"active") as $item)
                          <tr>
                            <td>
                              <img src="{{ asset('img/'.$item->profile_picture) }}">
                              <span class="ps-2">{{ $item->name }}</span>
                            </td>
                            <td> {{ $item->email }} </td>
                            <td> {{ $item->address }} </td>
                            <td> {{ $item->gender }} </td>
                            <td> {{ $item->nationality }} </td>
                            <td> {{ $item->contact_info }} </td>
                            <td>
                              <div class="badge badge-outline-success">Online</div>
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

            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">User Message</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                           
                            <th> Email Form </th>
                            <th> Created At </th>
                            <th></th>
                           
                          </tr>
                        </thead>
                        <tbody>

                        @foreach( DB::table('emails')->get() as $item)
                          <tr>
                
                            <td> {{ $item->email }} </td>
                            <td> {{ $item->created_at }} </td>
                            <td><a href="/show-email/{{ $item->id }}">Lihat Email</a></td>
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