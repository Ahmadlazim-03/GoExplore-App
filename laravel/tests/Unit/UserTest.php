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
    public function user_can_create_a_user()
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
    public function user_can_update_user(){
        User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => Hash::make('12345'),
        ]);

        $find = User::firstWhere('id',1);
        $find->name = 'test2';
        $find->email = 'test2@gmail.com';
        $find->save();

        $this->assertDatabaseHas('users', [
            'name' => 'test2',
            'email' => 'test2@gmail.com',
        ]);
    }
}
