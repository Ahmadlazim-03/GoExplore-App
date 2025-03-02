<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function user_can_login_with_valid_credentials_and_authentication(){
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 2, 
        ]);
        $response1 = $this->postJson('/login', [
            'email' => 'johndoe@gmail.com',
            'password' => 'password123',
        ])->assertStatus(200)
          ->assertJson([
            'redirect' => '/mybookings',
        ]);
        $this->assertAuthenticatedAs($user);
    }
    #[Test]
    public function admin_can_login_with_valid_credentials_and_authentication()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 1, 
        ]);
        $response1 = $this->postJson('/login', [
            'email' => 'admin@gmail.com',
            'password' => 'password123',
        ])->assertStatus(200)
          ->assertJson([
            'redirect' => '/dashboard',
        ]);
        $this->assertAuthenticatedAs($admin);
    }
    #[Test]
    public function user_and_admin_can_logout()
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 2, 
        ]);
        $this->actingAs($user);
        $this->assertAuthenticatedAs($user);
        $response1 = $this->getJson('/logout')
                          ->assertStatus(302)
                          ->assertRedirect('/');
        $this->assertGuest();

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 1, 
        ]);
        $this->actingAs($admin);
        $this->assertAuthenticatedAs($admin);
        $response2 = $this->getJson('/logout')
                          ->assertStatus(302)
                          ->assertRedirect('/');
        $this->assertGuest();
    }
    #[Test]
    public function guest_can_register()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com',
            'password' => bcrypt('password123'),
        ];
        $response1 = $this->post('/register', $data)
                          ->assertStatus(200);
        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com',
        ]);
    }
}