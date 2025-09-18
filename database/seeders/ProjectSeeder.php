<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'KODE_PROJECT' => 'PRJ001',
            'NAMA_PROJECT' => 'Upgrade Core Custody System',
        ]);
    }
}
