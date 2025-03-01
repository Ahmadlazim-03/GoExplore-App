<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Role;
use App\Models\User;
use PHPUnit\Framework\Attributes\Test;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CRUD_RoleTest extends TestCase
{

    use RefreshDatabase;

    #[Test]
    public function admin_can_read_role()
    {
        $admin = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 1, 
        ]);
        $this->actingAs($admin);
        Role::create([
            'name' => "user"
        ]);
        $response = $this->get('manajemenrole');
        $response->assertSee('user');
    }

    #[Test]
    public function admin_can_create_role()
    {
       
    }

    #[Test]
    public function admin_can_update_role()
    {
       
    }

    #[Test]
    public function admin_can_delete_role()
    {

    }
}
