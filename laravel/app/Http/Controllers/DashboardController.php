<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        return view('admin/dashboard',[
            "DB_Destination" => $destinations = Destination::paginate(5),
            "DB_User" => User::all()
        ]);
    }
}
