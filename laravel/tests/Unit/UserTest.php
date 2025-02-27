<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Attributes\Test;

class UserTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function can_create_a_user()
    {
        $user = User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => Hash::make('12345'),
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'test',
            'email' => 'test@gmail.com',
        ]);
    }

    #[Test]
    public function can_update_user()
    {
    
        $user = User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => Hash::make('12345'),
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'test',
            'email' => 'test@gmail.com',
        ]);

        $user->update([
            'name' => 'test2',
            'email' => 'test2@gmail.com',
        ]);

        $this->assertDatabaseMissing('users', [
            'name' => 'test',
            'email' => 'test@gmail.com',
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'test2',
            'email' => 'test2@gmail.com',
        ]);
    }

    #[Test]
    public function can_delete_user()
    {

        $user = User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => Hash::make('12345'),
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'test',
            'email' => 'test@gmail.com',
        ]);

        $user->delete();

        $this->assertDatabaseMissing('users', [
            'name' => 'test',
            'email' => 'test@gmail.com',
        ]);
    }
}
