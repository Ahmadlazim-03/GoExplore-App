<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\ListBookings;

class HomeController extends Controller
{
    public function index()
    {
        return view('landingpage/home', [
            'DB_Destination' => Destination::all(),
            'DB_ListBookings' => ListBookings::all(),
        ]);
    }
}
