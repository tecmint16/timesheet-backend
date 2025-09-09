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
        User::factory(10)->create();

        // Membuat pengguna dengan data spesifik
        User::create([
            'name' => 'Crispian',
            'email' => 'crispian@tecmint.com',
            'phone' => '082138864950',
            'roles' => 'admin',
            'password' => Hash::make('pian0987'),
        ]);
    }
}
