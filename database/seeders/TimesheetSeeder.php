<?php

namespace Database\Seeders;

use App\Models\Timesheet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimesheetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Timesheet::create([
            'TANGGAL' => '2025-09-17 18:00:00',
            'SHIFTING' => '2',
            'JAM_MASUK' => '2025-09-17 08:00:00',
            'JAM_PULANG' => '2025-09-17 16:00:00',
            'TOTAL_JAM_KERJA' => '8',
            'STATUS_KEHADIRAN' => 'Hadir',
            'KEGIATAN' => 'Testing Web Backend',
            'CREATED_AT' => now(),
            'UPDATED_AT' => now(),
            'ID_USER' => '1',
            'ID_PROJECT' => '1',
            'ID_CLUSTER' => '1',
        ]);
    }
}
