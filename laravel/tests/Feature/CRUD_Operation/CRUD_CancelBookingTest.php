<?php

namespace Tests\Feature;

use App\Models\CancelBooking;
use App\Models\Destination;
use App\Models\E_ticket;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CRUD_CancelBookingTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    private $destination;

    private $ticket;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => Hash::make('12345'),
        ]);

        $this->actingAs($this->user);

        $this->destination = Destination::create([
            'Name_Destination' => 'Candi Borobudur',
            'Locations' => 'Magelang',
            'Link_Location' => 'https://google/maps/example',
            'Description' => 'Candi Borobudur adalah candi Buddha terbesar di dunia.',
            'Price_perticket' => '50000',
            'Available_seat' => '100',
            'Image' => 'borobudur.jpg',
            'Category' => 'Wisata Sejarah dan Budaya',
            'Opening_hours' => '08:00 - 17:00',
            'tgl' => now(),
        ]);

        $this->ticket = E_ticket::create([
            'destination_id' => $this->destination->idDestination,
            'users_id' => $this->user->id,
            'order_id' => 1,
            'ticket_code' => Str::random(5),
            'issue_date' => now(),
            'valid_until' => now(),
            'qr_code' => '',
            'status' => 'Unpaid',
        ]);
    }

    #[Test]
    public function user_can_create_cancel_booking()
    {
        $response1 = $this->post('/cancelbookings', [
            'id_user' => $this->user->id,
            'id_ticket' => $this->ticket->ticket_id,
            'alasan' => 'Maaf tidak bisa sekarang',
            'test' => 'test',
        ]);

        $this->assertDatabaseHas('cancel_bookings', [
            'id_user' => $this->user->id,
            'id_ticket' => $this->ticket->ticket_id,
            'alasan' => 'Maaf tidak bisa sekarang',
        ]);
    }

    #[Test]
    public function user_can_read_cancel_booking()
    {
        CancelBooking::create([
            'id_user' => $this->user->id,
            'id_ticket' => $this->ticket->id,
            'alasan' => 'Maaf tidak bisa sekarang',
        ]);
        $response1 = $this->get('/cancelbookings')
            ->assertStatus(200)
            ->assertSeeHtml('Maaf tidak bisa sekarang');
    }
}
