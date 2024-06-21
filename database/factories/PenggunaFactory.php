<?php

namespace Database\Factories;

use App\Models\Peran;
use App\Models\Pengguna;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengguna>
 */
class PenggunaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_lengkap' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'telepon' => $this->faker->phoneNumber(),
            'kata_sandi' => bcrypt('password'),
            'foto_profil' => $this->faker->imageUrl(),
            'id_peran' => 2,
            'tanggal_dibuat' => now(),
        ];
    }
    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'id_peran' => 1,
        ]);
    }
}
