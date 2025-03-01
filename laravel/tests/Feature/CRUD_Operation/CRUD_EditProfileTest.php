<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use PHPUnit\Framework\Attributes\Test;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CRUD_EditProfileTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function user_can_read_edit_profile()
    {
        $picture = UploadedFile::fake()->create('dummy.jpg', 1);    
        $create_user = User::create([
            'name' => 'fake user',
            'email' => 'fakeuser@gmail.com',
            'password' => '12345', 
            'contact_info' => '081234567890',
            'profile_picture' => $picture,
            'full_name' => 'fake User',
            'address' => 'Jl. Testing No. 123',
            'date_of_birth' => '2000-01-01',
            'gender' => 'male',
            'nationality' => 'Indonesia',
            'role' => 'user',
            'status' => 'inactive',
            '_token' => csrf_token(),
        ]);
        $this->actingAs($create_user);
        $response = $this->get('/editprofile');
        $response->assertSee('fake user')
                 ->assertSee('fakeuser@gmail.com')
                 ->assertSee('081234567890');
    }
    #[Test]
    public function user_can_update_edit_profile()
    {
        $picture = UploadedFile::fake()->create('dummy.jpg', 1);    
        $create_user = User::create([
            'name' => 'fake user',
            'email' => 'fakeuser@gmail.com',
            'password' => '12345', 
            'contact_info' => '081234567890',
            'profile_picture' => $picture,
            'full_name' => 'fake User',
            'address' => 'Jl. Testing No. 123',
            'date_of_birth' => '2000-01-01',
            'gender' => 'male',
            'nationality' => 'Indonesia',
            'role' => 'user',
            'status' => 'inactive',
            '_token' => csrf_token(),
        ]);
        $this->actingAs($create_user); 
        $picture = UploadedFile::fake()->create('dummy2.jpg', 1);   
        $new_data_profile = [
            'name' => 'fake user 2',
            'email' => 'fakeuser2@gmail.com',
            'password' => '12345', 
            'contact_info' => '081233605876',
            'profile_picture' => $picture,
            'full_name' => 'fake User 2',
            'address' => 'Jl. Testing No. 123',
            'date_of_birth' => '2000-01-01',
            'gender' => 'male',
            'nationality' => 'Indonesia',
            'role' => 'user',
            'status' => 'inactive',
            '_token' => csrf_token(),
        ];
        $this->post('/editprofile', $new_data_profile);
        $response = $this->get('/editprofile');
        $response->assertSee('fake user 2')
                 ->assertSee('fakeuser2@gmail.com');
    }
}

