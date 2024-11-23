<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function all_destination(){
        return view('admin/destination/all-destination');
    }
}
