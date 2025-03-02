<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\E_ticket;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function checkout(Request $request){ 

        try {
            $request->request->add([
                'user_id' => $request->id_user,
                'count' => $request->qty,
                'total_price' => $request->qty * $request->mount,
                'date' => $request->date,
                'status' => 'Unpaid'
            ]);
            
            $order = Order::create($request->all());
    
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            \Midtrans\Config::$isProduction = false;
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;
        
            $params = [
                'transaction_details' => [
                    'order_id' => $order->id,
                    'gross_amount' => $order->total_price,
                ],
                'customer_details' => [
                    'name' => $request->name,
                    'phone' => $request->phone,
                ],
            ];
            
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            
            if ($snapToken) {
                E_ticket::create([
                    "users_id" => $request->id_user,
                    "destination_id" => $request->id_destination,
                    "order_id" => Order::latest('id')->first()->id,
                    "ticket_code" => Str::random(5),
                    "issue_date" => $request->date,
                    "valid_until" => Carbon::parse($request->date)->addDay(),
                    "qr_code" =>  "",
                    "status" => 'Unpaid'
                ]);
            } 
    
            return response()->json([
                'snapToken' => $snapToken,
                'latest_id_ticket' => E_ticket::latest('ticket_id')->first()->ticket_id
            ]);
        } catch (\Exception $e) {
            Log::info('Jaringan tidak aman / tidak ada jaringan / proses gagal');
        }
        
    }    
}
