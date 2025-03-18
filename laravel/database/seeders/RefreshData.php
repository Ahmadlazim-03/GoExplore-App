<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RefreshData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Insert Users
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'admin',
                'password' => '$2y$12$CYsa/qLl77rsC0qaRP00Ie.XVkzZewLrLJsPqI5VKG.CHfCUn0j26',
                'email' => 'admin@gmail.com',
                'phone_number' => null,
                'profile_picture' => 'a4b08a58-6a81-42b7-93fa-7e023fdc93fe.jpg',
                'full_name' => 'Ahmad Lazim',
                'address' => 'Jombang',
                'date_of_birth' => '2024-11-06',
                'gender' => 'male',
                'nationality' => 'Indonesia',
                'contact_info' => '081233605876',
                'role' => '1',
                'status' => 'inactive',
                'created_at' => '2024-11-22 07:28:43',
                'updated_at' => '2025-02-19 00:59:07',
                'remember_token' => null,
            ],
            [
                'id' => 2,
                'name' => 'Tia',
                'password' => '$2y$12$hasHMv1Bw01ACIq/wjDDIeiKmONbfaWvtctqzwVybYF/m3ovr8YCe',
                'email' => 'hello@gmail.com',
                'phone_number' => '0812336005876',
                'profile_picture' => 'tia.jpg',
                'full_name' => 'Tia Jovanka',
                'address' => 'Jombang',
                'date_of_birth' => '2024-12-01',
                'gender' => 'female',
                'nationality' => 'Indonesia',
                'contact_info' => '081233605876',
                'role' => '2',
                'status' => 'inactive',
                'created_at' => '2024-12-01 07:48:50',
                'updated_at' => '2024-12-17 18:46:34',
                'remember_token' => null,
            ]
        ]);

        // Insert Roles
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'admin', 'created_at' => null, 'updated_at' => null],
            ['id' => 2, 'name' => 'user', 'created_at' => '2024-11-30 16:03:36', 'updated_at' => '2024-11-30 16:03:36'],
        ]);

        // Insert Destinations
        DB::table('destinations')->insert([
            [
                'idDestination' => 3,
                'Name_Destination' => 'Tugu Pahlawan',
                'Locations' => 'Jalan Pahlawan, Surabaya',
                'Link_Location' => 'https://www.google.com/maps/place/Monumen+Tugu+Pahlawan',
                'Description' => 'Tugu Pahlawan adalah monumen yang dibangun untuk mengenang pertempuran Surabaya pada 10 November 1945.',
                'Price_perticket' => '15000',
                'Available_seat' => '31',
                'Image' => 'tugu_pahlawan.jpg',
                'Category' => 'Wisata Sejarah dan Budaya',
                'Opening_hours' => '19:00',
                'tgl' => '2024-12-05 00:00:00',
                'rating' => '4',
                'created_at' => '2024-11-30 19:42:50',
                'updated_at' => '2024-12-17 19:12:35',
            ],
        ]);

        // Insert Detail Destinations
        DB::table('detail_destinations')->insert([
            [
                'id' => 5,
                'destinations_id' => 3,
                'image' => '["/img/1733050362_detail_tugu_pahlawan.webp"]',
                'description' => 'Tugu Pahlawan adalah monumen yang dibangun untuk mengenang pertempuran heroik yang terjadi pada 10 November 1945 di Surabaya.',
                'video' => '0x766964656f706c61796261636b2e6d7034',
                'rating' => '4',
                'created_at' => '2024-11-30 20:09:33',
                'updated_at' => '2024-11-30 20:52:42',
            ],
        ]);
    }
}
