<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\ListBookings;
use Illuminate\Support\Facades\Auth;

class ListBookingsController extends Controller
{
    public function index()
    {
        return view('user/listbookings', [
            'DB_ListBookings' => ListBookings::where('id_user', Auth::user()->id)->latest()->paginate(10),
            'DB_Destination' => Destination::all(),
            'DD_Destination' => Destination::all(),
        ]);
    }
}
