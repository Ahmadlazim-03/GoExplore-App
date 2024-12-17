<?php

namespace App\Http\Controllers;

use App\Models\ListBookings;
use Illuminate\Support\Facades\Auth;
use App\Models\Destination;
use Illuminate\Http\Request;

class ListBookingsController extends Controller
{
    public function index(){
        return view('user/listbookings',[
            "DB_ListBookings" => ListBookings::where('id_user', Auth::user()->id)->latest()->paginate(10),
            "DB_Destination" => Destination::all(),
            "DD_Destination" => Destination::all()
        ]);
    }
}
