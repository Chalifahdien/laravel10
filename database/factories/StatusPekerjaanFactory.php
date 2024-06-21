<?php

namespace Database\Factories;

use App\Models\StatusPekerjaan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StatusPekerjaan>
 */
class StatusPekerjaanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = StatusPekerjaan::class;

    public function definition()
    {
        return [
            'nama_status' => $this->faker->randomElement(['Menunggu', 'Sedang Diproses', 'Tersedia' ,'Selesai', 'Dibatalkan']),
        ];
    }
}
