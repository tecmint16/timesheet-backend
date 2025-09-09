<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Menjalankan perintah seeder untuk membuat 10 pengguna acak menggunakan UserFactory(/database/factories/UserFactory.php)
        // User::factory(5)->create();

        // Membuat pengguna dengan data spesifik
        User::create([
            'NAME' => 'Crispian',
            'EMAIL' => 'crispian@tecmint.com',
            'PHONE' => '082138864950',
            'ROLES' => 'admin',
            'PASSWORD' => Hash::make('pian0987'),
        ]);
    }
}
