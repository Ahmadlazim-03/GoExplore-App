<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Destination;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;


class SearchingDestinationTest extends TestCase
{
    use RefreshDatabase; 
    #[Test]
    public function user_can_search_destination_by_name()
    {
        Destination::create([
            'Name_Destination' => 'Tugu Pahlawan',
            'Locations' => 'Jalan Pahlawan, Surabaya',
            'Link_Location' => 'https://www.google.com/maps/place/Monumen+Tugu+Pahlawan/',
            'Description' => 'Monumen untuk mengenang pertempuran Surabaya.',
            'Price_perticket' => '15000',
            'Available_seat' => '31',
            'Image' => 'tugu_pahlawan.jpg',
            'Category' => 'Wisata Sejarah dan Budaya',
            'Opening_hours' => '19:00',
            'tgl' => '2024-12-05 00:00:00',
            'rating' => '4',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $response1 = $this->get('/destination?name=Tugu')
                          ->assertStatus(200)
                          ->assertSee('Tugu Pahlawan');
    }

    #[Test]
    public function user_can_search_destination_by_category()
    {
        Destination::create([
            'Name_Destination' => 'Tugu Pahlawan',
            'Locations' => 'Jalan Pahlawan, Surabaya',
            'Link_Location' => 'https://www.google.com/maps/place/Monumen+Tugu+Pahlawan/',
            'Description' => 'Monumen untuk mengenang pertempuran Surabaya.',
            'Price_perticket' => '15000',
            'Available_seat' => '31',
            'Image' => 'tugu_pahlawan.jpg',
            'Category' => 'Wisata Sejarah dan Budaya',
            'Opening_hours' => '19:00',
            'tgl' => '2024-12-05 00:00:00',
            'rating' => '4',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $response1 = $this->get('/destination?category=Wisata+Sejarah+dan+Budaya')
                          ->assertStatus(200)
                          ->assertSee('Tugu Pahlawan');
    }

    #[Test]
    public function user_can_search_destination_by_rating()
    {
        Destination::create([
            'Name_Destination' => 'Tugu Pahlawan',
            'Locations' => 'Jalan Pahlawan, Surabaya',
            'Link_Location' => 'https://www.google.com/maps/place/Monumen+Tugu+Pahlawan/',
            'Description' => 'Monumen untuk mengenang pertempuran Surabaya.',
            'Price_perticket' => '15000',
            'Available_seat' => '31',
            'Image' => 'tugu_pahlawan.jpg',
            'Category' => 'Wisata Sejarah dan Budaya',
            'Opening_hours' => '19:00',
            'tgl' => '2024-12-05 00:00:00',
            'rating' => '4',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $csrfToken = csrf_token();
        $response1 = $this->get('/destination', [
            'X-CSRF-TOKEN' => $csrfToken,
            'rating' => '4'
        ])->assertStatus(200)
          ->assertSeeText('Tugu Pahlawan');
    }
    
    #[Test]
    public function user_can_search_destination_by_multiple_filters()
    {
        Destination::create([
            'Name_Destination' => 'Tugu Pahlawan',
            'Locations' => 'Jalan Pahlawan, Surabaya',
            'Link_Location' => 'https://www.google.com/maps/place/Monumen+Tugu+Pahlawan/',
            'Description' => 'Monumen untuk mengenang pertempuran Surabaya.',
            'Price_perticket' => '15000',
            'Available_seat' => '31',
            'Image' => 'tugu_pahlawan.jpg',
            'Category' => 'Wisata Sejarah dan Budaya',
            'Opening_hours' => '19:00',
            'tgl' => '2024-12-05 00:00:00',
            'rating' => '4',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $csrfToken = csrf_token();
        $response1 = $this->get('/destination', [
            'X-CSRF-TOKEN' => $csrfToken,
            'name' => 'Tugu',
            'category' => 'Wisata Sejarah dan Budaya',
            'rating' => '4'
        ])->assertStatus(200)
          ->assertSeeText('Tugu Pahlawan');
    }

    #[Test]
    public function search_with_no_results_should_return_message()
    {
        Destination::create([
            'Name_Destination' => 'Tugu Pahlawan',
            'Locations' => 'Jalan Pahlawan, Surabaya',
            'Link_Location' => 'https://www.google.com/maps/place/Monumen+Tugu+Pahlawan/',
            'Description' => 'Monumen untuk mengenang pertempuran Surabaya.',
            'Price_perticket' => '15000',
            'Available_seat' => '31',
            'Image' => 'tugu_pahlawan.jpg',
            'Category' => 'Wisata Sejarah dan Budaya',
            'Opening_hours' => '19:00',
            'tgl' => '2024-12-05 00:00:00',
            'rating' => '4',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $response1 = $this->get('/destination?name=Invalid Name&category=Invalid Category&rating=Invalid Rating')
                          ->assertStatus(200)
                          ->assertSeeText('Oops! Tidak ada hasil yang ditemukan');
    }   
}
