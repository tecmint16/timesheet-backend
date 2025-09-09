<?php

namespace Database\Seeders;

use App\Models\Aplikasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AplikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Aplikasi::factory(5)->create();

        Aplikasi::create([
            'NAMA_APLIKASI' => 'Medallion',
        ]);
    }
}
