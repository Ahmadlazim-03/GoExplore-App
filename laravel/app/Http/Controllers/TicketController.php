<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\E_ticket;
use App\Models\Order;
use App\Models\User;

class TicketController extends Controller
{
    public function show_ticket($id)
    {
        $ticket = E_ticket::where('ticket_id', $id)->first();
        $order = Order::where('id', $ticket->order_id)->first();
        $count = $order->count;

        return view('user/e_ticket', [
            'ticket' => E_ticket::where('ticket_id', $id)->first(),
            'destination' => Destination::all(),
            'user' => User::all(),
            'order' => Order::all(),
            'count' => $count,
        ]);
    }
}
