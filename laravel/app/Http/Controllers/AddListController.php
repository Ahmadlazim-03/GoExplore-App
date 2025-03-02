<?php

namespace App\Http\Controllers;
use App\Models\ListBookings;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AddListController extends Controller
{
    public function index(Request $request){
        $id_user = $request->id_user;
        $id_destination = $request->id_destination;
        $existingBooking = ListBookings::where('id_user', $id_user)
                                ->where('id_destination', $id_destination);

        if ($existingBooking->exists()) {
            Log::info($request->all());
            $existingBooking->delete(); 
            return response()->json([
                'menghapus' => 'menghapus'
            ]);
        } else {
            $add = ListBookings::create([
                'id_user' => $request->id_user,
                'id_destination' => $request->id_destination
            ]);
    
            if($add){
                return response()->json([
                    'menambah' => "menambah"
                ]);
            }
        };
    }
}
