<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function checkout(Request $request){
        Log::info($request);

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
    
        // Return snapToken as JSON
        return response()->json(['snapToken' => $snapToken]);
    }    
}
