<?php

namespace App\Http\Controllers;

use App\Models\E_ticket;
use Illuminate\Http\Request;
use App\Models\Destination;
use Illuminate\Support\Facades\Log;

class AcceptPaidController extends Controller
{
    public function change_status(Request $request){
        $change_status = E_ticket::where('ticket_id', $request->latest_id_ticket)->update([
            'status' => 'Paid'
        ]);

        $validated = $request->validate([
            'id' => 'required|exists:destinations,idDestination', 
            'count_seat' => 'required|numeric'
        ]);
        $destination = Destination::where('idDestination', $validated['id'])->first();

        if ($destination) {
            $available_seat = (int) $destination->Available_seat;
            $new_seat_value = $available_seat - (int) $validated['count_seat'];
            $destination->Available_seat = (string) $new_seat_value;
            $destination->save();
        }
    }
}
