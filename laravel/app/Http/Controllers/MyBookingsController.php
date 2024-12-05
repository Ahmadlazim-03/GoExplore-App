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
            "ticket" => E_ticket::all()->where('users_id',Auth::user()->id),
            "destination" => Destination::all(),
            "order" => Order::all()
        ]);
    }
}
