<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\E_ticket;
use App\Models\User;
use App\Models\Order;
use App\Models\Destination;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function show_ticket($id){
        $ticket = E_ticket::where('ticket_id', $id)->first();
        $order = Order::where('id',$ticket->order_id)->first();
        $count = $order->count;
        return view('user/e_ticket',[
            "ticket" =>  E_ticket::where('ticket_id', $id)->first(),
            "destination" => Destination::all(),
            "user" => User::all(),
            "order" => Order::all(),
            "count" => $count
        ]);
    }
}
