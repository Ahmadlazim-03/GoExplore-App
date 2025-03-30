<?php

namespace Tests\Feature;

use App\Models\Destination;
use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class MidtransPaymentTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function user_can_make_midtrans_payment()
    {
        Destination::create([
            'name' => 'Tugu Pahlawan',
            'location' => 'Jalan Pahlawan, Surabaya',
            'link_location' => 'https://www.google.com/maps/',
            'description' => 'Tugu Pahlawan adalah monumen...',
            'price_per_ticket' => 15000,
            'available_seat' => 31,
            'category' => 'Wisata Sejarah dan Budaya',
            'opening_hours' => '19:00',
            'tgl' => '2024-12-05 00:00:00',
            'rating' => 4,
        ]);
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 1,
        ]);
        $requestData = [
            'id_user' => $user->id,
            'id_destination' => 1,
            'qty' => 2,
            'mount' => 50000,
            'date' => now()->toDateString(),
            'name' => 'John Doe',
            'phone' => '08123456789',
        ];
        $response1 = $this->postJson('/checkout', $requestData)
            ->assertStatus(200);
        $this->assertDatabaseHas('orders', [
            'user_id' => $user->id,
            'count' => 2,
            'total_price' => 100000,
            'status' => 'Unpaid',
        ]);
        $order = Order::latest()->first();
        $params = [
            'transaction_details' => [
                'order_id' => $order->id,
                'gross_amount' => $order->total_price,
            ],
            'customer_details' => [
                'name' => $user->name,
                'phone' => '08123456789',
            ],
        ];
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $this->assertNotEmpty($snapToken);
    }
}
