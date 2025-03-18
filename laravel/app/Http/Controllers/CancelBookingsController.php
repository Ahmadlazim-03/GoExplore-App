<?php

namespace App\Http\Controllers;
use App\Models\CancelBooking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\E_ticket;
use App\Models\Destination;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

class CancelBookingsController extends Controller
{
    public function show_cancel_bookings(){
        return view('user/cancelbookings',[
            "DB_cancelbook" => CancelBooking::where('id_user',Auth::user()->id)->latest()->paginate(10),
            "DB_destination" => Destination::all(),
            "DB_ticket" => E_ticket::all(),
            'DB_order' => Order::all(),
        ]);
    }


    public function cancel_bookings(Request $request){
        if($request->test != null) {
            CancelBooking::create([
                "id_user" => Auth::user()->id, // Pastikan user login
                "id_ticket" => $request->id_ticket, // Perbaikan dari $request->id
                "alasan" => $request->alasan 
            ]);
        
            $ticket = E_ticket::where('id', $request->id_ticket)->first(); // Perbaikan primary key
            if ($ticket) {
                $ticket->status = "Unpaid";
                $ticket->save();
            }
        
            $order = Order::where('id', $ticket->order_id)->first();
        
            $destination = Destination::where("id", $ticket->destination_id)->first(); // Perbaikan primary key
            if ($destination) {
                $availableSeat = intval($destination->Available_seat); 
                $destination->Available_seat = $availableSeat + ($order ? $order->count : 0);
                $destination->save();
            }
        } else {
            CancelBooking::create([
                "id_user" => Auth::user()->id,
                "id_ticket" => $request->id,
                "alasan" => $request->alasan 
            ]);
    
            $ticket = E_ticket::where('ticket_id',$request->id)->first();
            if ($ticket) {
                $ticket->status = "Unpaid";
                $ticket->save();
            }
    
            $order = Order::where('id',$ticket->order_id)->first();
    
            $destination = Destination::where("idDestination", $ticket->destination_id)->first();
            if ($destination) {
                $availableSeat = intval($destination->Available_seat); 
                $destination->Available_seat = $availableSeat + $order->count;
                $destination->save();
            }
        }

    }
}
