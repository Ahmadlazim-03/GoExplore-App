<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_login_with_valid_credentials()
    {
        // Buat user di database
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 1, // Sesuaikan dengan yang ada di LoginController
        ]);

        // Kirim permintaan login
        $response = $this->postJson('/login', [
            'email' => 'johndoe@gmail.com',
            'password' => 'password123',
        ]);

        // Periksa apakah response JSON mengandung redirect yang benar
        $response->assertJson([
            'redirect' => '/dashboard',
        ]);

        // Pastikan user telah terautentikasi
        $this->assertAuthenticatedAs($user);
    }
}

