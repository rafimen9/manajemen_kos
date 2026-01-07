<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kamar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@kos.com',
            'password' => bcrypt('password123'),
        ]);

        // Create sample kamars
        Kamar::create([
            'kode_kamar' => 'K001',
            'nama_kamar' => 'Kamar 1A',
            'harga' => 500000,
            'status' => 'Kosong',
        ]);

        Kamar::create([
            'kode_kamar' => 'K002',
            'nama_kamar' => 'Kamar 1B',
            'harga' => 500000,
            'status' => 'Kosong',
        ]);

        Kamar::create([
            'kode_kamar' => 'K003',
            'nama_kamar' => 'Kamar 2A',
            'harga' => 600000,
            'status' => 'Kosong',
        ]);
    }
}
