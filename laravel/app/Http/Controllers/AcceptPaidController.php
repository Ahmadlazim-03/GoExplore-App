<?php

namespace App\Http\Controllers;

use App\Models\E_ticket;
use App\Models\ListBookings;
use Illuminate\Http\Request;
use App\Models\Destination;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AcceptPaidController extends Controller
{
    public function change_status(Request $request){

        if ($request->option == 1) {
            // Find the booking where id_destination matches and id_user matches the authenticated user's ID
            $booking = ListBookings::where('id_destination', $request->id)
                                    ->where('id_user', Auth::user()->id)
                                    ->first();
        
            if ($booking) {
                // If a matching booking is found, delete it
                $booking->delete();
            }
        }

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
