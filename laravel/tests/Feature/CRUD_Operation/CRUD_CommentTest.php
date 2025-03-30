<?php

namespace Tests\Feature;

use App\Models\Comment;
use App\Models\Destination;
use App\Models\DetailDestination;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CRUD_CommentTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private $user;

    private $destination;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::create([
            'name' => 'test_user',
            'email' => 'testuser@gmail.com',
            'password' => Hash::make('password123'),
        ]);

        $this->destination = Destination::create([
            'Name_Destination' => 'Pantai Kuta',
            'Locations' => 'Bali',
            'Link_Location' => 'https://google/maps/kuta',
            'Description' => 'Pantai Kuta adalah pantai terkenal di Bali.',
            'Price_perticket' => 100000,
            'Available_seat' => 50,
            'Image' => '1733047773_detail_tugu_pahlawan_2.jpg',
            'Category' => 'Wisata Sejarah dan Budaya',
            'Opening_hours' => '07:00 - 19:00',
            'tgl' => now(),
        ]);

        DetailDestination::create([
            'destinations_id' => $this->destination->idDestination,
            'image' => json_encode(['1733047773_detail_tugu_pahlawan_2.jpg', '1733047773_detail_tugu_pahlawan_3.jpg']),
            'description' => 'Detail lengkap tentang Pantai Kuta.',
            'video' => 'https://youtube.com/example',
            'rating' => 5,
        ]);

        $this->actingAs($this->user);
    }

    #[Test]
    public function user_can_create_comment()
    {
        $commentData = [
            'rating' => 4,
            'comment' => 'Tempat ini sangat indah dan nyaman.',
            '_token' => csrf_token(),
        ];
        $response1 = $this->post('/tambah-comment/'.$this->destination->idDestination, $commentData)
            ->assertStatus(302);
        $this->assertDatabaseHas('comments', data: [
            'id_destination' => $this->destination->idDestination,
            'id_user' => $this->user->id,
            'rating' => 4,
            'comment' => 'Tempat ini sangat indah dan nyaman.',
        ]);
    }

    #[Test]
    public function user_can_read_comment()
    {
        Comment::create([
            'id_destination' => $this->destination->idDestination,
            'id_user' => $this->user->id,
            'rating' => 5,
            'comment' => 'Sangat bagus, saya suka tempat ini!',
        ]);
        $response1 = $this->get('/destination/single-page/'.$this->destination->idDestination)
            ->assertStatus(200)
            ->assertSeeText('Sangat bagus, saya suka tempat ini!');
    }
}
