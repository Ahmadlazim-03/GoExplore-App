<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CRUD_RoleTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function admin_can_create_role()
    {
        $admin = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 1,
        ]);
        $this->actingAs($admin);
        $create_role = [
            'role' => 'user',
        ];
        $response1 = $this->post('/manajemen-role-create', $create_role)
            ->assertStatus(302);
        $this->assertDatabaseHas('roles', [
            'name' => 'user',
        ]);
    }

    #[Test]
    public function admin_can_read_role()
    {
        $admin = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 1,  // 1 == admin
        ]);
        $this->actingAs($admin);
        $create_role = Role::create([
            'name' => 'user',
        ]);
        $response1 = $this->get('/manajemenrole')
            ->assertStatus(200)
            ->assertSee('user');
    }

    #[Test]
    public function admin_can_update_role()
    {
        $admin = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 1,  // 1 == admin
        ]);
        $this->actingAs($admin);
        $create_role = Role::create([
            'name' => 'user',
        ]);
        $response1 = $this->get('/manajemenrole')
            ->assertStatus(200)
            ->assertSee('user');
        $update_role = [
            'ID' => $create_role->id,
            'role' => 'admin',
        ];
        $response2 = $this->post('/manajemen-role-edit', $update_role)
            ->assertStatus(302);
        $response3 = $this->get('/manajemenrole')
            ->assertStatus(200)
            ->assertSee('user');
    }

    #[Test]
    public function admin_can_delete_role()
    {
        $admin = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 1,  // 1 == admin
        ]);
        $this->actingAs($admin);
        $create_role = Role::create([
            'name' => 'user',
        ]);
        $response1 = $this->get('/manajemenrole')
            ->assertStatus(200)
            ->assertSee('user');
        $response2 = $this->get('/manajemen-role-delete/'.$create_role->id)
            ->assertStatus(302)
            ->assertRedirect('/manajemenrole')
            ->assertDontSee('user');
        $this->assertDatabaseMissing('roles', [
            'name' => 'user',
        ]);
    }
}
