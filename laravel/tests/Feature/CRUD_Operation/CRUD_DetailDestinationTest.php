<?php

namespace Tests\Feature;

use App\Models\DetailDestination;
use Tests\TestCase;
use App\Models\User;
use App\Models\Destination;
use Illuminate\Http\UploadedFile;
use PHPUnit\Framework\Attributes\Test;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CRUD_DetailDestinationTest extends TestCase
{

    use RefreshDatabase;

    #[Test]
    public function admin_can_create_detail_destination()
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
            'Link_Location' => 'https://google/maps/example',
            'Description' => 'Candi Borobudur adalah candi Buddha terbesar di dunia.',
            'Price_perticket' => '50000',
            'Available_seat' => '100',
            'Image' => 'borobudur.jpg',
            'Category' => 'Wisata Sejarah dan Budaya',
            'Opening_hours' => '17:00',
            'tgl' => now()->format('Y-m-d H:i:s'),
        ]);
        $image1 = UploadedFile::fake()->create('image1.jpg', 1);
        $image2 = UploadedFile::fake()->create('image2.jpg', 1);
        $video = UploadedFile::fake()->create('video.mp4', 10); 
        $data_detail_destination = [
            'id_destination' => $destination->idDestination, 
            'image' => [$image1, $image2],  
            'description' => 'Detail lengkap Candi Borobudur.',
            'video' => $video,
            'rating' => 5,
        ];
        $response = $this->post('/create-detail-destination', $data_detail_destination);
        $this->assertDatabaseHas('detail_destinations', [
            'destinations_id' => $destination->idDestination,
            'description' => 'Detail lengkap Candi Borobudur.',
            'rating' => 5,
        ]);
        $response->assertRedirect();
    }
    #[Test]
    public function user_and_admin_can_read_detail_destination()
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
            'Opening_hours' => '17:00',
            'tgl' => now()->format('Y-m-d H:i:s'),
        ]);
        $image1 = UploadedFile::fake()->create('image_dummy1.jpg', 1);;
        $image2 = UploadedFile::fake()->create('image_dummy2.jpg', 1);;
        $video  = UploadedFile::fake()->create('video.mp4', 10);
        $imagePaths = [
            $image1->store('img', 'public'),
            $image2->store('img', options: 'public'),
        ];
        $videoPath = $video->store('video', 'public');
        DetailDestination::create([
            'destinations_id' => $destination->idDestination, 
            'image' => json_encode($imagePaths),
            'description' => 'Detail lengkap mengenai Candi Borobudur.',
            'video' => $videoPath, 
            'rating' => 5,
        ]);

        $user = User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 2, 
        ]);
        $this->actingAs($user);
        $response = $this->get("/destination/single-page/" . $destination->idDestination);
        $response->assertSeeText("Detail lengkap mengenai Candi Borobudur.");
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 1, 
        ]);
        $this->actingAs($admin);
        $response = $this->get("/destination/single-page/" . $destination->idDestination);
        $response->assertSeeText("Detail lengkap mengenai Candi Borobudur.");
    }

    #[Test]
    public function admin_can_update_detail_destination()
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
            'Link_Location' => 'https://google/maps/example',
            'Description' => 'Candi Borobudur adalah candi Buddha terbesar di dunia.',
            'Price_perticket' => '50000',
            'Available_seat' => '100',
            'Image' => 'borobudur.jpg',
            'Category' => 'Wisata Sejarah dan Budaya',
            'Opening_hours' => '17:00',
            'tgl' => now()->format('Y-m-d H:i:s'),
        ]);
        $image1 = UploadedFile::fake()->create('image_dummy1.jpg',1);
        $image2 = UploadedFile::fake()->create('image_dummy2.jpg',1);
        $video  = UploadedFile::fake()->create('video.mp4', 10);
        $imagePaths = [
            $image1->store('img', 'public'),
            $image2->store('img', 'public'),
        ];
        $videoPath = $video->store('video', 'public');
        $create_detail_destination = DetailDestination::create([
            'destinations_id' => $destination->idDestination, 
            'image' => json_encode($imagePaths),
            'description' => 'Detail lengkap mengenai Candi Borobudur.',
            'video' => $videoPath, 
            'rating' => 5,
        ]);
        $newImage1 = UploadedFile::fake()->create('new_image1.jpg',1);
        $newImage2 = UploadedFile::fake()->create('new_image2.jpg',1);
        $newVideo  = UploadedFile::fake()->create('new_video.mp4', 10);
        $updateData = [
            'id_detail_destination' => $create_detail_destination->id, 
            'id_destination'        => $destination->idDestination, 
            'image'                 => [$newImage1, $newImage2],
            'description'           => 'Deskripsi terbaru detail destinasi.',
            'video'                 => $newVideo,
            'rating'                => 5,
            '_token'                => csrf_token(),
        ];
        $response = $this->post('/edit-detail-destination', $updateData);
        $response = $this->get("/destination/single-page/" . $destination->idDestination);
        $response->assertSeeText("Deskripsi terbaru detail destinasi.");
    }
    #[Test]
    public function admin_can_delete_detail_destination()
    {
        $admin = User::create([
            'name'     => 'admin',
            'email'    => 'admin@gmail.com',
            'password' => bcrypt('password123'),
            'role'     => 1, 
        ]);
        $this->actingAs($admin);
        $destination = Destination::create([
            'Name_Destination' => 'Candi Borobudur',
            'Locations'        => 'Magelang',
            'Link_Location'    => 'https://google/maps/example',
            'Description'      => 'Candi Borobudur adalah candi Buddha terbesar di dunia.',
            'Price_perticket'  => '50000',
            'Available_seat'   => '100',
            'Image'            => 'borobudur.jpg',
            'Category'         => 'Wisata Sejarah dan Budaya',
            'Opening_hours'    => '17:00',
            'tgl'              =>  now()->format('Y-m-d H:i:s'),
        ]);
        $image = UploadedFile::fake()->create('detail.jpg',1);
        $video = UploadedFile::fake()->create('detail_video.mp4', 10);
        $imagePath = $image->store('img', 'public');
        $videoPath = $video->store('video', 'public');
        $detailDestination = DetailDestination::create([
            'destinations_id' => $destination->idDestination,
            'image'           => json_encode([$imagePath]),
            'description'     => 'Detail lengkap mengenai Candi Borobudur.',
            'video'           => $videoPath,
            'rating'          => 5,
        ]);
        $response = $this->get('/delete-detail-destination/' . $detailDestination->id);
        $response->assertRedirect();
        $this->assertDatabaseMissing('detail_destinations', [
            'id' => $detailDestination->id,
        ]);
    }
}
