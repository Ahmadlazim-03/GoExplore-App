<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\UploadedFile;
use PHPUnit\Framework\Attributes\Test;

class CRUD_UserTest extends TestCase
{
    use RefreshDatabase;
    private $admin;

    public function setUp(): void
    {
        parent::setUp();
        $this->admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 1,
        ]);

        $this->actingAs($this->admin);
    }
    #[Test]
    public function admin_can_create_user()
    {   
        $file = UploadedFile::fake()->create('dummy.jpg', 1);    
        $userData = [
            'name' => 'fake user',
            'email' => 'fakeuser@gmail.com',
            'password' => '12345', 
            'contact_info' => '081234567890',
            'profile_picture' => $file,
            'full_name' => 'Fake User',
            'address' => 'Jl. Testing No. 123',
            'date_of_birth' => '2000-01-01',
            'gender' => 'male',
            'nationality' => 'Indonesia',
            'role' => 'user',
            'status' => 'inactive',
            '_token' => csrf_token(),
        ];   
        $response1 = $this->post('/manajemen-user-create', $userData);
        $response1->assertStatus(302);
        $response1->assertRedirect('/manajemenuser');
        $this->assertDatabaseHas('users', [
            'name' => 'fake user',
            'email' => 'fakeuser@gmail.com',
        ]);
        $response2 = $this->get('/manajemenuser');
        $response2->assertStatus(200);
        $response2->assertSee('fakeuser@gmail.com');
    }

    #[Test]
    public function admin_can_read_user()
    {
        User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => Hash::make('12345'),
        ]);
        $response1 = $this->get('/manajemenuser');
        $response1->assertStatus(200);
        $response1->assertSee('test@gmail.com');
    }

    #[Test]
    public function admin_can_update_user()
    {
        $file = UploadedFile::fake()->create('dummy.jpg', 1);    
        $user_create = User::create([
            'name' => 'dummy',
            'email' => 'dummy@gmail.com',
            'password' => '12345', 
            'contact_info' => '081234567890',
            'profile_picture' => $file,
            'full_name' => 'fake User',
            'address' => 'Jl. Testing No. 123',
            'date_of_birth' => '2000-01-01',
            'gender' => 'male',
            'nationality' => 'Indonesia',
            'role' => 2,
            'status' => 'inactive',
        ]);
        $this->assertDatabaseHas('users', [
            'name' => 'dummy',
            'email' => 'dummy@gmail.com',
        ]);
        $file = UploadedFile::fake()->create('updatedummy.jpg', 1);    
        $data_update_user = [
            'ID' => $user_create->id,
            'name' => 'update dummy',
            'email' => 'updatedummy@gmail.com',
            'contact_info' => '089999999999',
            'profile_picture' => $file,
            'full_name' => 'update dummy',
            'address' => 'Jl. Dummy No. 123',
            'date_of_birth' => '1111-11-11',
            'gender' => 'female',
            'nationality' => 'Singapura',
            'role' => 1,
            'status' => 'inactive',
        ];
        $response1 = $this->post('/manajemen-user-edit', $data_update_user);
        $response1->assertStatus(302);
        $response1->assertRedirect('/manajemenuser');
        $this->assertDatabaseMissing('users', [
            'name' => 'dummy',
            'email' => 'dummy@gmail.com',
        ]);
        $this->assertDatabaseHas('users', [
            'name' => 'update dummy',
            'email' => 'updatedummy@gmail.com',
        ]);
    }

    #[Test]
    public function admin_can_delete_user()
    {
        $file = UploadedFile::fake()->create('dummy.jpg', 1);    
        $user_create = User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => '12345', 
            'contact_info' => '081234567890',
            'profile_picture' => $file,
            'full_name' => 'fake User',
            'address' => 'Jl. Testing No. 123',
            'date_of_birth' => '2000-01-01',
            'gender' => 'male',
            'nationality' => 'Indonesia',
            'role' => 2,
            'status' => 'inactive',
        ]);
        $this->assertDatabaseHas('users', [
            'name' => 'test',
            'email' => 'test@gmail.com',
        ]);
        $response1 = $this->get('/manajemen-user-delete/' . $user_create->id);
        $response1->assertStatus(302);
        $response1->assertRedirect('/manajemenuser');
        $this->assertDatabaseMissing('users', [
            'name' => 'test',
            'email' => 'test@gmail.com',
        ]);
    }
}
