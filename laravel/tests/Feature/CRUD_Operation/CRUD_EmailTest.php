<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Email;
use PHPUnit\Framework\Attributes\Test;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CRUD_EmailTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function user_can_create_email()
    {
        $user = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 2, 
        ]);
        $this->actingAs($user);
        $data_email = [
            'name' => "user",
            'email' => "user@gmail.com",
            'subject' => "ini adalah subjek",
            'pesan' => "ini adalah pesan"
        ];
        $response1 = $this->post('/send-email', $data_email)
                          ->assertStatus(200);
        $this->assertDatabaseHas('emails',[
            'name' => "user",
            'email' => "user@gmail.com",
            'subject' => "ini adalah subjek",
            'pesan' => "ini adalah pesan"
        ]);
    }
    #[Test]
    public function admin_can_read_email()
    {
        $admin = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 1, 
        ]);
        $this->actingAs($admin);
        $create_email = Email::create([
            'name' => "user",
            'email' => "user@gmail.com",
            'subject' => "ini adalah subjek",
            'pesan' => "ini adalah pesan"
        ]);
        $response1 = $this->get('/show-email/' . $create_email->id)
                         ->assertStatus(200)
                         ->assertSee('user')      
                         ->assertSee('user@gmail.com')
                         ->assertSee('ini adalah subjek')
                         ->assertSee('ini adalah pesan');
    }
}

