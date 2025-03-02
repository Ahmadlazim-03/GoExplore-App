<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Order;
use App\Models\E_ticket;
use App\Models\Destination;
use Illuminate\Support\Str;
use PHPUnit\Framework\Attributes\Test;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CRUD_E_TicketTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function user_can_create_e_ticket()
    {
        $create_destination = Destination::create([
            'name' => 'Candi Borobudur',
            'location' => 'Jalan Pahlawan, Surabaya',
            'link_location' => 'https://www.google.com/maps/',
            'description' => 'Tugu Pahlawan adalah monumen...',
            'price_per_ticket' => 15000,
            'available_seat' => 31,
            'category' => 'Wisata Sejarah dan Budaya',
            'opening_hours' => '19:00',
            'tgl' => '2024-12-05 00:00:00',
            'rating' => 4
        ]);
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 1, 
        ]);
        $this->actingAs($user);
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
                'order_id' => 2,
                'gross_amount' => $order->total_price,
            ],
            'customer_details' => [
                'name' => $user->name,
                'phone' => '08123456789',
            ],
        ];     
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        if ($snapToken) {
            E_ticket::create([
                "destination_id" => $create_destination->idDestination,
                "users_id" => User::latest()->first()->id,
                "order_id" => 1,
                "ticket_code" => Str::random(5),
                "issue_date" => now(),
                "valid_until" => now(),
                "qr_code" =>  "",
                "status" => 'Unpaid'
            ]);         
            $this->assertDatabaseHas('e_tickets', [
                "destination_id" => $create_destination->idDestination,
                "users_id" => User::latest()->first()->id,
                "order_id" => 1,
                "issue_date" => now(),
                "valid_until" => now(),
                "qr_code" =>  "",
                "status" => 'Unpaid'
            ]);
        } 
    }
    #[Test]
    public function user_can_read_e_ticket()
    {
        $create_destination = Destination::create([
            'name' => 'Tugu Pahlawan',
            'location' => 'Jalan Pahlawan, Surabaya',
            'link_location' => 'https://www.google.com/maps/',
            'description' => 'Tugu Pahlawan adalah monumen...',
            'price_per_ticket' => 15000,
            'available_seat' => 31,
            'category' => 'Wisata Sejarah dan Budaya',
            'opening_hours' => '19:00',
            'tgl' => '2024-12-05 00:00:00',
            'rating' => 4
        ]);
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 1, 
        ]);
        $this->actingAs($user);
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
                'order_id' => 1,
                'gross_amount' => $order->total_price,
            ],
            'customer_details' => [
                'name' => $user->name,
                'phone' => '08123456789',
            ],
        ];     
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        if ($snapToken) {
            E_ticket::create([
                "destination_id" => $create_destination->idDestination,
                "users_id" => User::latest()->first()->id,
                "order_id" => 1,
                "ticket_code" => Str::random(5),
                "issue_date" => now(),
                "valid_until" => now(),
                "qr_code" =>  "",
                "status" => 'Unpaid'
            ]);         
            $response2 = $this->get('mybookings')
                              ->assertStatus(200)
                              ->assertSee($create_destination->name);
        }  
    }
}

