<?php

namespace Database\Factories;

use App\Models\Peran;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Peran>
 */
class PeranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Peran::class;

    public function definition()
    {
        return [
            'nama_peran' => $this->faker->randomElement(['Admin', 'Pengguna']),
        ];
    }
}
