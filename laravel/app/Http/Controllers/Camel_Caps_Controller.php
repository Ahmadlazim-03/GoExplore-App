<?php

namespace App\Http\Controllers;

use App\Models\ListBookings;
use Illuminate\Http\Request;
use App\Models\Destination;

class Camel_Caps_Controller extends Controller
{
    public function index(){
        return view('landingpage/home', [
            'DB_Destination' => Destination::all(),
            'DB_ListBookings' => ListBookings::all(),
        ]);
    }
}
