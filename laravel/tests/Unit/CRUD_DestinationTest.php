<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Destination;
use PHPUnit\Framework\Attributes\Test;

class CRUD_DestinationTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function user_can_create_a_destination()
    {
        Destination::create([
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

        $this->assertDatabaseHas('destinations', [
            'Name_Destination' => 'Candi Borobudur',
            'Locations' => 'Magelang',
        ]);
    }

    #[Test]
    public function user_can_update_destination()
    {
        $destination = Destination::create([
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

        $destination->update([
            'Name_Destination' => 'Candi Prambanan',
            'Locations' => 'Yogyakarta',
        ]);

        $this->assertDatabaseMissing('destinations', [
            'Name_Destination' => 'Candi Borobudur',
            'Locations' => 'Magelang',
        ]);

        $this->assertDatabaseHas('destinations', [
            'Name_Destination' => 'Candi Prambanan',
            'Locations' => 'Yogyakarta',
        ]);
    }

    #[Test]
    public function user_can_delete_destination()
    {

        $destination = Destination::create([
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
     
        $this->assertDatabaseHas('destinations', [
            'Name_Destination' => 'Candi Borobudur',
            'Locations' => 'Magelang',
        ]);

        $destination->delete();
        
        $this->assertDatabaseMissing('destinations', [
            'Name_Destination' => 'Candi Borobudur',
            'Locations' => 'Magelang',
        ]);
    }
}
