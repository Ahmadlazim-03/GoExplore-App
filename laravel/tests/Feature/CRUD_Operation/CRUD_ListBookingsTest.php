<?php

namespace Tests\Feature;

use App\Models\Destination;
use App\Models\ListBookings;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CRUD_ListBookingsTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function user_can_create_list_bookings()
    {
        $user = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 1,
        ]);
        $this->actingAs($user);
        $create_destination = Destination::create([
            'Name_Destination' => 'Candi Borobudur',
            'Locations' => 'Magelang',
            'Link_Location' => 'https://google/maps/example',
            'Description' => 'Candi Borobudur adalah candi Buddha terbesar di dunia.',
            'Price_perticket' => '50000',
            'Available_seat' => '100',
            'Image' => 'borobudur.jpg',
            'Category' => 'Wisata Sejarah dan Budaya',
            'Opening_hours' => '08:00 - 17:00',
            'tgl' => now()->format('Y-m-d H:i:s'),
        ]);
        $data_list_booking = [
            'id_user' => $user->id,
            'id_destination' => $create_destination->idDestination,
        ];
        $response1 = $this->post('/add-list', $data_list_booking)
            ->assertStatus(200);
        $response2 = $this->get('/listbookings')
            ->assertStatus(200)
            ->assertSee('Candi Borobudur');
        $this->assertDatabaseHas('list_bookings', [
            'id_user' => $user->id,
            'id_destination' => $create_destination->idDestination,
        ]);
    }

    #[Test]
    public function user_can_read_list_bookings()
    {
        $user = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 1,
        ]);
        $this->actingAs($user);
        $create_destination = Destination::create([
            'Name_Destination' => 'Candi Borobudur',
            'Locations' => 'Magelang',
            'Link_Location' => 'https://google/maps/example',
            'Description' => 'Candi Borobudur adalah candi Buddha terbesar di dunia.',
            'Price_perticket' => '50000',
            'Available_seat' => '100',
            'Image' => 'borobudur.jpg',
            'Category' => 'Wisata Sejarah dan Budaya',
            'Opening_hours' => '08:00 - 17:00',
            'tgl' => now()->format('Y-m-d H:i:s'),
        ]);
        $create_list_bookings = ListBookings::create([
            'id_user' => $user->id,
            'id_destination' => $create_destination->idDestination,
        ]);
        $response1 = $this->get('/listbookings')
            ->assertStatus(200)
            ->assertSee('Candi Borobudur');
    }

    #[Test]
    public function user_can_delete_list_bookings()
    {
        $user = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 1,
        ]);
        $this->actingAs($user);
        $create_destination = Destination::create([
            'Name_Destination' => 'Candi Borobudur',
            'Locations' => 'Magelang',
            'Link_Location' => 'https://google/maps/example',
            'Description' => 'Candi Borobudur adalah candi Buddha terbesar di dunia.',
            'Price_perticket' => '50000',
            'Available_seat' => '100',
            'Image' => 'borobudur.jpg',
            'Category' => 'Wisata Sejarah dan Budaya',
            'Opening_hours' => '08:00 - 17:00',
            'tgl' => now()->format('Y-m-d H:i:s'),
        ]);
        $create_list_bookings = ListBookings::create([
            'id_user' => $user->id,
            'id_destination' => $create_destination->idDestination,
        ]);
        $response1 = $this->post('/add-list', ['id_user' => $user->id, 'id_destination' => $create_destination->idDestination])
            ->assertStatus(200);
        $response2 = $this->get('/listbookings')
            ->assertStatus(200)
            ->assertDontSee('Candi Borobudur');
        $this->assertDatabaseMissing('list_bookings', [
            'id_user' => $user->id,
            'id_destination' => $create_destination->idDestination,
        ]);
    }
}
