<?php

namespace App\Http\Controllers;
use App\Models\E_ticket;
use App\Models\Destination;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class MyBookingsController extends Controller
{
    public function index(){
        return view('user/mybookings',[
            "ticket" => E_ticket::where('users_id', Auth::user()->id)->where('status', 'Paid')->orderBy('ticket_id', 'asc')->paginate(10), 
            "destination" => Destination::all(),
            "order" => Order::all()
        ]);
    }
}
