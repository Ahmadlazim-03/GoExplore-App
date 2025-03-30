<?php

namespace Tests\Feature;

use App\Models\Destination;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CRUD_DestinationTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function admin_can_create_destination()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 1,
        ]);
        $this->actingAs($admin);
        $file = UploadedFile::fake()->create('dummy.txt', 1);
        $data = [
            'Name_Destination' => 'Candi Borobudur',
            'Locations' => 'Magelang',
            'Description' => 'Candi Borobudur adalah candi Buddha terbesar di dunia.',
            'Price_perticket' => '50000',
            'Available_seat' => '100',
            'Image' => $file,
            'Category' => 'Wisata Sejarah dan Budaya',
            'Opening_hours' => '08:00 - 17:00',
            'tgl' => now()->format('Y-m-d H:i:s'),
            '_token' => csrf_token(),
        ];
        $response1 = $this->post('/create-destination', $data)
            ->assertStatus(302)
            ->assertRedirect('/alldestination');
        $this->assertDatabaseHas('destinations', array_diff_key($data, array_flip(['_token', 'Image'])));
    }

    #[Test]
    public function user_and_admin_can_read_destination()
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
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 2,
        ]);
        $this->actingAs($user);
        $response1 = $this->get('/destination')
            ->assertStatus(200)
            ->assertSee('Candi Borobudur');
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 1,
        ]);
        $this->actingAs($admin);
        $response2 = $this->get('/destination')
            ->assertStatus(200)
            ->assertSee('Candi Borobudur');
    }

    #[Test]
    public function admin_can_update_destination()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 1,
        ]);
        $this->actingAs($admin);
        $file1 = UploadedFile::fake()->create('gambar1.jpg', 1);
        $destination = Destination::create([
            'Name_Destination' => 'Candi Borobudur',
            'Locations' => 'Magelang',
            'Description' => 'Candi Borobudur adalah candi Buddha terbesar di dunia.',
            'Price_perticket' => '50000',
            'Available_seat' => '100',
            'Image' => $file1,
            'Category' => 'Wisata Sejarah dan Budaya',
            'Opening_hours' => '08:00 - 17:00',
            'tgl' => now()->format('Y-m-d H:i:s'),
        ]);
        $file2 = UploadedFile::fake()->create('gambar2.jpg', 1);
        $update_data = [
            'idDestination' => $destination->idDestination,
            'Name_Destination' => 'Candi Prambanan',
            'Locations' => 'Yogyakarta',
            'Description' => 'Candi Prambanan adalah candi Hindu terbesar di Indonesia.',
            'Price_perticket' => '60000',
            'Available_seat' => '200',
            'Image' => $file2,
            'Category' => 'Wisata Sejarah dan Budaya',
            'Opening_hours' => '07:00 - 18:00',
            'tgl' => now()->format('Y-m-d H:i:s'),
            '_token' => csrf_token(),
        ];
        $response1 = $this->post('/edit-destination', $update_data)
            ->assertStatus(302)
            ->assertRedirect('/alldestination');
        $this->assertDatabaseHas('destinations', [
            'idDestination' => $destination->idDestination,
            'Name_Destination' => 'Candi Prambanan',
            'Locations' => 'Yogyakarta',
            'Description' => 'Candi Prambanan adalah candi Hindu terbesar di Indonesia.',
            'Price_perticket' => '60000',
            'Available_seat' => '200',
            'Category' => 'Wisata Sejarah dan Budaya',
            'Opening_hours' => '07:00 - 18:00',
        ]);
    }

    #[Test]
    public function admin_can_delete_destination()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 1,
        ]);
        $this->actingAs($admin);
        $destination = Destination::create([
            'Name_Destination' => 'Candi Borobudur',
            'Locations' => 'Magelang',
            'Description' => 'Candi Borobudur adalah candi Buddha terbesar di dunia.',
            'Price_perticket' => '50000',
            'Available_seat' => '100',
            'Image' => 'borobudur.jpg',
            'Category' => 'Wisata Sejarah dan Budaya',
            'Opening_hours' => '08:00 - 17:00',
            'tgl' => now()->format('Y-m-d H:i:s'),
        ]);
        $response1 = $this->get("/delete-destination/{$destination->idDestination}")
            ->assertStatus(302)
            ->assertRedirect('/alldestination');
        $this->assertDatabaseMissing('destinations', [
            'idDestination' => $destination->idDestination,
            'Name_Destination' => 'Candi Borobudur',
            'Locations' => 'Magelang',
            'Description' => 'Candi Borobudur adalah candi Buddha terbesar di dunia.',
            'Price_perticket' => '50000',
            'Available_seat' => '100',
            'Image' => 'borobudur.jpg',
            'Category' => 'Wisata Sejarah dan Budaya',
            'Opening_hours' => '08:00 - 17:00',
            'tgl' => now()->format('Y-m-d H:i:s'),
        ]);
    }
}
