<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function user_can_login_with_valid_credentials()
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 1, 
        ]);

        $response = $this->postJson('/login', [
            'email' => 'johndoe@gmail.com',
            'password' => 'password123',
        ]);

        $response->assertJson([
            'redirect' => '/dashboard',
        ]);

        $this->assertAuthenticatedAs($user);
    }
 

}

