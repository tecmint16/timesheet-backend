<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Timesheet>
 */
class TimesheetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'TANGGAL'          => $this->faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d H:i:s'),
            'SHIFTING'         => $this->faker->numberBetween(1, 3),
            'JAM_MASUK'        => $this->faker->dateTimeBetween('08:00:00', '10:00:00')->format('Y-m-d H:i:s'),
            'JAM_PULANG'       => $this->faker->dateTimeBetween('17:00:00', '19:00:00')->format('Y-m-d H:i:s'),
            'TOTAL_JAM_KERJA'  => $this->faker->numberBetween(6, 10),
            'STATUS_KEHADIRAN' => $this->faker->randomElement(['Hadir', 'Izin', 'Sakit', 'Alpa']),
            'PROJECT'          => $this->faker->sentence(2),
            'KODE_PROJECT'     => strtoupper($this->faker->lexify('PRJ???')),
            'CLUSTER'          => $this->faker->word(),
            'APLIKASI'         => $this->faker->word(),
            'KEGIATAN'         => $this->faker->sentence(4),
            'ID_USER'          => $this->faker->numberBetween(1, 50),
            'ID_PROJECT'       => $this->faker->numberBetween(1, 20),
        ];
    }
}
