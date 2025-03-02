<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Menu;
use App\Models\User;
use PHPUnit\Framework\Attributes\Test;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CRUD_MenuTest extends TestCase
{

    use RefreshDatabase;

    #[Test]
    public function admin_can_create_menu()
    {
        $admin = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 1,  // 1 == admin
        ]);
        $this->actingAs($admin);
        $data_create_menu = [
            "tipe_menu" => "dropdown",
            "name" => "edit profile",
            "icon_menu" => "mdi-contacts",
            "href" => "/",
            "id_parent" => "",
        ];
        $response1 = $this->post('/manajemen-menu-create', $data_create_menu)
                          ->assertStatus(302)
                          ->assertRedirect('/manajemenmenu');
        $response2 = $this->get('/manajemenmenu') 
                          ->assertStatus(200)
                          ->assertSee('edit profile');
        $this->assertDatabaseHas('menus',[
            "name" => "edit profile"
        ]);                    
    }
    #[Test]
    public function admin_can_read_menu()
    {
        $admin = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 1,  // 1 == admin
        ]);
        $this->actingAs($admin);
        $create_menu = Menu::create([
            "tipe_menu" => "dropdown",
            "name" => "edit profile",
            "icon_menu" => "mdi-contacts",
            "href" => "/",
            "id_parent" => "",
        ]);
        $response1 = $this->get('/manajemenmenu')
                         ->assertStatus(200)
                         ->assertSee('edit profile');
    }
    #[Test]
    public function admin_can_update_menu()
    {
        $admin = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 1,  // 1 == admin
        ]);
        $this->actingAs($admin);
        $create_menu = Menu::create([
            "tipe_menu" => "dropdown",
            "name" => "edit profile",
            "icon_menu" => "mdi-contacts",
            "href" => "/",
            "id_parent" => "",
        ]);
        $response1 = $this->get('/manajemenmenu')
                          ->assertStatus(200)
                          ->assertSee('edit profile');
        $data_update_menu = [
            "ID" => $create_menu->id,
            "tipe_menu" => "single",
            "name" => "logout",
            "icon_menu" => "mdi-laptop",
            "href" => "/logout",
            "id_parent" => ""
        ];
        $response2 = $this->post('/manajemen-menu-edit', $data_update_menu)
                          ->assertStatus(302)
                          ->assertRedirect('/manajemenmenu');
        $response3 = $this->get('/manajemenmenu')
                          ->assertStatus(200)
                          ->assertSee('logout')
                          ->assertDontSee('edit profile');
    }
    #[Test]
    public function admin_can_delete_menu()
    {
        $admin = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 1,  // 1 == admin
        ]);
        $this->actingAs($admin);
        $create_menu = Menu::create([
            "tipe_menu" => "dropdown",
            "name" => "edit profile",
            "icon_menu" => "mdi-contacts",
            "href" => "/",
            "id_parent" => "",
        ]);
        $response1 = $this->get('/manajemenmenu')
                          ->assertStatus(200)
                          ->assertSee('edit profile');
        $response2 = $this->get('/manajemen-menu-delete/'. $create_menu->id)
                          ->assertStatus(302)
                          ->assertRedirect('/manajemenmenu');
        $response3 = $this->get('/manajemenmenu')
                          ->assertStatus(200)
                          ->assertDontSee('edit profile');
        $this->assertDatabaseMissing('menus',[
            "name" => "edit profile",
        ]);
    }
}
